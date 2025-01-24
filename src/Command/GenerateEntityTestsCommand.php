<?php

declare(strict_types=1);

namespace App\Command;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\FieldMapping;
use Faker\Factory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;

class GenerateEntityTestsCommand extends Command
{
    public const CMD_NAME = 'app:generate:entity-tests';

    private string $projectDir;

    private array $generatedValues = [];

    private $faker;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly ParameterBagInterface $parameterBag
    ) {
        parent::__construct(name: self::CMD_NAME);
        $this->projectDir = $this->parameterBag->get('kernel.project_dir');
        $this->faker = Factory::create(locale: 'fr_FR');
    }

    protected function configure(): void
    {
        $this->setDescription(description: 'Génère les tests unitaires pour les entités Doctrine');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Réinitialiser les valeurs générées au début de chaque exécution
        $this->generatedValues = [];

        $io = new SymfonyStyle($input, $output);

        // Vérification et création du fichier EntityTestCase si nécessaire
        $this->createEntityTestCaseIfNotExists();

        // Récupération de toutes les entités
        $metadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $entities = [];

        foreach ($metadata as $classMetadata) {
            $entities[] = $classMetadata->getName();
        }

        // Création de la question pour choisir l'entité
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            question: 'Quelle entité voulez-vous tester ?',
            choices: $entities
        );

        $entityClass = $helper->ask(input: $input, output: $output, question: $question);
        $className = substr(strrchr(haystack: $entityClass, needle: '\\'), offset: 1);

        // Récupération des métadonnées de l'entité sélectionnée
        $entityMetadata = $this->entityManager->getClassMetadata(className: $entityClass);

        // Création du contenu du test
        $testContent = $this->generateTestContent(className: $className, metadata: $entityMetadata);

        // Création du fichier de test
        $filesystem = new Filesystem();
        $testDir = $this->projectDir.'/tests/Entity';
        $testFilePath = $testDir.'/'.$className.'Test.php';

        if (!$filesystem->exists(files: $testDir)) {
            $filesystem->mkdir(dirs: $testDir);
        }

        $filesystem->dumpFile(filename: $testFilePath, content: $testContent);

        $io->success(sprintf('Test unitaire généré pour l\'entité %s : %s', $className, $testFilePath));

        return Command::SUCCESS;
    }

    private function createEntityTestCaseIfNotExists(): void
    {
        $filesystem = new Filesystem();
        $abstractDir = $this->projectDir.'/tests/Abstract';
        $testCaseFile = $abstractDir.'/EntityTestCase.php';

        if (!$filesystem->exists(files: $abstractDir)) {
            $filesystem->mkdir(dirs: $abstractDir);
        }

        if (!$filesystem->exists(files: $testCaseFile)) {
            $content = $this->getEntityTestCaseContent();
            $filesystem->dumpFile(filename: $testCaseFile, content: $content);
        }
    }

    private function generateTestContent(string $className, $metadata): string
    {
        $properties = $metadata->getFieldNames();
        $testMethods = [];

        // Génération de la méthode getEntity
        $getEntityMethod = $this->generateGetEntityMethod(className: $className, metadata: $metadata);
        $testMethods[] = $getEntityMethod;

        // Test de validation de l'entité
        $testMethods[] = $this->generateEntityValidationTest(className: $className);

        // Tests des getters et setters pour chaque propriété
        foreach ($properties as $property) {
            $camelCase = $this->snakeToCamelCase(string: $property);
            $getter = 'get'.ucfirst(string: $camelCase);
            $type = $metadata->getTypeOfField($property);
            $testValue = $this->generateFakerValue(type: $type, property: $property);

            // Test du getter
            $testMethods[] = $this->generateGetterTest(property: $property, className: $className, metadata: $metadata);
        }

        // Construction du fichier de test complet
        return sprintf(
            '<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\%s;
use App\Tests\Abstract\EntityTestCase;
use DateTimeImmutable;

class %sTest extends EntityTestCase
{
    private ?%s $entity = null;

%s
}
',
            $className,
            $className,
            $className,
            implode("\n\n", $testMethods)
        );
    }

    private function generateGetEntityMethod(string $className, $metadata): string
    {
        $properties = $metadata->getFieldNames();
        $setters = [];
        $imports = ['use DateTimeImmutable;', 'use DateTime;'];

        $reflectionClass = new \ReflectionClass($metadata->getName());

        foreach ($properties as $property) {
            if ('id' === $property) {
                continue;
            }

            $reflectionProperty = $reflectionClass->getProperty($property);
            $propertyType = $reflectionProperty->getType();
            $camelCase = $this->snakeToCamelCase($property);
            $setter = 'set'.ucfirst($camelCase);

            $columnMapping = $metadata->getFieldMapping($property);

            // Générer la valeur et la stocker
            $value = $this->generateValueBasedOnType($columnMapping, $property, $propertyType);

            // Si c'est une Enum, ajouter l'import
            if (isset($columnMapping['enumType'])) {
                $imports[] = "use {$columnMapping['enumType']};";
            }

            $setters[] = sprintf('        $%s->%s(%s: %s);',
                lcfirst($className),
                $setter,
                $property,
                $value
            );
        }

        // Rendre les imports uniques
        $imports = array_unique($imports);

        return sprintf(
            "    public function getEntity%s(): %s\n    {\n        \$%s = new %s();\n%s\n        return \$%s;\n    }",
            $className,
            $className,
            lcfirst($className),
            $className,
            implode("\n", $setters),
            lcfirst($className)
        );
    }

    private function generateValueBasedOnType(mixed $columnMapping, string $property, ?\ReflectionType $propertyType): string
    {
        // Si une valeur a déjà été générée pour cette propriété, la réutiliser
        if (isset($this->generatedValues[$property])) {
            return $this->generatedValues[$property];
        }

        // Convertir FieldMapping en tableau si nécessaire
        $mappingArray = $columnMapping instanceof FieldMapping
            ? (array) $columnMapping
            : $columnMapping;

        // Vérifier si c'est une Enum
        if (isset($mappingArray['enumType'])) {
            $value = $this->generateEnumValue($mappingArray['enumType']);
            $this->generatedValues[$property] = $value;

            return $value;
        }

        $type = $mappingArray['type'] ?? null;
        $nullable = $propertyType?->allowsNull() ?? false;

        if ($nullable && 0 === random_int(0, 1)) {
            $value = 'null';
            $this->generatedValues[$property] = $value;

            return $value;
        }

        $value = match ($type) {
            Types::STRING, 'string' => $this->generateStringValue($property),
            Types::SIMPLE_ARRAY, 'simple_array', 'array' => $this->generateArrayValue($property),
            Types::DATETIME_IMMUTABLE, 'datetime_immutable' => 'new DateTimeImmutable(datetime: "2023-01-01 12:00:00")',
            Types::DATETIME_MUTABLE, 'datetime' => 'new DateTime(datetime: "2023-01-01 12:00:00")',
            Types::INTEGER, 'integer' => (string) $this->faker->numberBetween(1, 100),
            Types::BOOLEAN, 'boolean' => $this->faker->boolean ? 'true' : 'false',
            Types::FLOAT, 'float', Types::DECIMAL, 'decimal' => (string) $this->faker->randomFloat(2, 0, 100),
            Types::TEXT, 'text' => sprintf('"%s"', $this->faker->paragraph),
            Types::DATE_IMMUTABLE, 'date_immutable' => 'new DateTimeImmutable(datetime: "2023-01-01")',
            Types::JSON, 'json' => '[]',
            default => $nullable ? 'null' : sprintf('"%s"', $this->faker->words(3, true))
        };

        $this->generatedValues[$property] = $value;

        return $value;
    }

    private function generateEnumValue(string $enumClass): string
    {
        // Récupérer le nom court de la classe Enum
        $enumShortName = substr($enumClass, strrpos($enumClass, '\\') + 1);

        // Récupérer tous les cas de l'enum
        $enumReflection = new \ReflectionClass($enumClass);
        $cases = $enumReflection->getConstants();

        if (empty($cases)) {
            throw new \RuntimeException(message: "L'enum $enumClass n'a pas de cas définis");
        }

        // Prendre le premier cas de l'enum
        $firstCase = key($cases);

        return sprintf('%s::%s', $enumShortName, $firstCase);
    }

    private function generateStringValue(string $property): string
    {
        $value = match (true) {
            str_contains($property, 'email') => sprintf('"%s"', $this->faker->email),
            str_contains($property, 'password') => '"Password123!"',
            str_contains($property, 'phone') => sprintf('"%s"', $this->faker->phoneNumber),
            str_contains($property, 'firstname') => sprintf('"%s"', $this->faker->firstName),
            str_contains($property, 'lastname') => sprintf('"%s"', $this->faker->lastName),
            str_contains($property, 'nni') => sprintf('"%s"', 'A'.$this->faker->numerify('#####')),
            str_contains($property, 'address') => sprintf('"%s"', $this->faker->address),
            str_contains($property, 'city') => sprintf('"%s"', $this->faker->city),
            str_contains($property, 'zip') => sprintf('"%s"', $this->faker->postcode),
            str_contains($property, 'name') => sprintf('"%s"', $this->faker->name),
            default => sprintf('"%s"', $this->faker->words(3, true))
        };

        return $value;
    }

    private function generateArrayValue(string $property): string
    {
        return match (true) {
            str_contains($property, 'roles') => "['ROLE_USER']",
            default => '[]'
        };
    }

    private function generateEntityValidationTest(string $className): string
    {
        return sprintf(
            '    public function testEntity%sIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntity%s(), count: 0);
    }',
            $className,
            $className
        );
    }

    private function generateGetterTest(string $property, string $className, $metadata): string
    {
        $reflectionClass = new \ReflectionClass($metadata->getName());
        $reflectionProperty = $reflectionClass->getProperty($property);
        $columnMapping = $metadata->getFieldMapping($property);

        // Utiliser la même valeur que celle générée pour getEntity
        $expectedValue = $this->generatedValues[$property] ??
            $this->generateValueBasedOnType($columnMapping, $property, $reflectionProperty->getType());

        return sprintf(
            '    public function testGet%s(): void
    {
        $entity = $this->getEntity%s();
        self::assertEquals(expected: %s, actual: $entity->get%s());
        $this->assertValidationErrorsCount($entity, count: 0);
    }',
            ucfirst($property),
            $className,
            $expectedValue,
            ucfirst($property)
        );
    }

    private function generateExpectedTestValue($columnMapping, string $property, \ReflectionProperty $reflectionProperty): string
    {
        // Convertir FieldMapping en tableau si nécessaire
        $mappingArray = $columnMapping instanceof FieldMapping
            ? (array) $columnMapping
            : $columnMapping;

        // Si c'est une Enum
        if (isset($mappingArray['enumType'])) {
            $enumClass = $mappingArray['enumType'];
            $enumReflection = new \ReflectionClass($enumClass);
            $enumCases = $enumReflection->getConstants();
            $enumClassName = substr($enumClass, strrpos($enumClass, '\\') + 1);

            return $enumClassName.'::'.key($enumCases);
        }

        return $this->generateValueBasedOnType($mappingArray, $property, $reflectionProperty->getType());
    }

    private function generateFakerValue(string $type, string $property): string
    {
        switch ($type) {
            case 'string':
                if (str_contains($property, 'email')) {
                    return sprintf('"%s"', $this->faker->email);
                }
                if (str_contains($property, 'phone')) {
                    return sprintf('"%s"', $this->faker->phoneNumber);
                }
                if (str_contains($property, 'address')) {
                    return sprintf('"%s"', $this->faker->address);
                }
                if (str_contains($property, 'city')) {
                    return sprintf('"%s"', $this->faker->city);
                }
                if (str_contains($property, 'zip')) {
                    return sprintf('"%s"', $this->faker->postcode);
                }
                if (str_contains($property, 'password')) {
                    return '"Password123!"';
                }
                if (str_contains($property, 'name')) {
                    return sprintf('"%s"', $this->faker->name);
                }

                return sprintf('"%s"', $this->faker->words(3, true));
            case 'integer':
                return (string) $this->faker->numberBetween(int1: 1, int2: 100);
            case 'boolean':
                return $this->faker->boolean ? 'true' : 'false';
            case 'float':
                return (string) $this->faker->randomFloat(nbMaxDecimals: 2, min: 0, max: 100);
            case 'datetime':
            case 'date':
                return 'new DateTimeImmutable()';
            case 'array':
                if (str_contains($property, 'roles')) {
                    return "['ROLE_USER']";
                }

                return '[]';
            default:
                return 'null';
        }
    }

    private function snakeToCamelCase(string $string): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $string))));
    }

    private function getEntityTestCaseContent(): string
    {
        return '<?php

declare(strict_types=1);

namespace App\Tests\Abstract;

use Exception;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class EntityTestCase extends KernelTestCase
{
    /**
     * @throws Exception
     */
    public function assertValidationErrorsCount(object $entity, int $count, ?string $expectedMessage = null): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $validator = $container->get(ValidatorInterface::class);
        $violations = $validator->validate($entity);
        $messages = [];
        foreach ($violations as $violation) {
            $messages[] =
                \'Erreur sur la Propriété \'
                . ucfirst($violation->getPropertyPath()) . \' => \' . $violation->getMessage();
        }
        self::assertCount(
            expectedCount: $count,
            haystack: $violations,
            message: implode(separator:PHP_EOL, array: $messages)
        );
        if ($expectedMessage !== null && !in_array(needle: $expectedMessage, haystack: $messages, strict: true)) {
            $this->fail("Le message d\'erreur \'$expectedMessage\' n\'a pas été trouvé dans les violations.");
        }
    }

    /**
     * @throws Exception
     */
    public function validateEntity(object $entity): ConstraintViolationListInterface
    {
        self::bootKernel();
        $container = self::getContainer();
        return $container->get(ValidatorInterface::class)->validate($entity);
    }

    public function assertContainsViolation(string $message, ConstraintViolationListInterface $violations): void
    {
        foreach ($violations as $violation) {
            if ($violation->getMessage() === $message) {
                return;
            }
        }
        $this->fail("Le message d\'erreur \'$message\' n\'a pas été trouvé dans les violations.");
    }
}';
    }
}
