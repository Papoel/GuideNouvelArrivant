<?php

declare(strict_types=1);

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\String\UnicodeString;

#[AsCommand(
    name: 'app:generate:dto',
    description: 'Génère un DTO à partir d\'une entité existante'
)]
class GenerateDtoCommand extends Command
{
    public const CMD_NAME = 'app:generate:dto';
    private string $projectDir;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly ParameterBagInterface $parameterBag
    ) {
        parent::__construct(name: self::CMD_NAME);
        $this->projectDir = $this->parameterBag->get('kernel.project_dir');
    }

    protected function configure(): void
    {
        $this
            ->addArgument(
                name: 'entity',
                mode: InputArgument::OPTIONAL,  // Argument optionnel pour permettre le choix interactif
                description: 'Nom de l\'entité (ex: App\Entity\User)'
            )
            ->addArgument(
                name: 'properties',
                mode: InputArgument::IS_ARRAY,
                description: 'Liste des propriétés à inclure (vide = toutes)'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Récupération de la liste des entités disponibles
        $allMetadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $entities = array_map(static fn ($meta) => $meta->getName(), $allMetadata);

        // Vérifie si l'argument "entity" est manquant et propose une sélection
        $entityClass = $input->getArgument('entity');
        if (!$entityClass) {
            $entityClass = $io->choice(
                'Pour quelle entité voulez-vous créer un DTO ?',
                $entities
            );
            $input->setArgument('entity', $entityClass);
        }

        $selectedProperties = $input->getArgument('properties');

        // Vérification de l'existence de l'entité
        if (!class_exists($entityClass)) {
            $io->error("L'entité $entityClass n'existe pas.");

            return Command::FAILURE;
        }

        // Analyse de l'entité via Doctrine
        $metadata = $this->entityManager->getClassMetadata($entityClass);
        $properties = empty($selectedProperties)
            ? array_keys($metadata->fieldMappings)
            : $selectedProperties;

        // Génération du namespace et du nom de la classe
        $entityName = (new UnicodeString(basename(str_replace('\\', '/', $entityClass))))
            ->toString();
        $dtoNamespace = str_replace('Entity', 'Dto', $metadata->namespace);
        $dtoClassName = $entityName.'Dto';

        // Génération du code du DTO
        $dtoCode = $this->generateDtoCode($dtoNamespace, $dtoClassName, $properties, $metadata);

        // Création du fichier
        $dtoDir = $this->projectDir.'/src/Dto';
        if (!is_dir($dtoDir) && !mkdir($dtoDir, recursive: true) && !is_dir($dtoDir)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $dtoDir));
        }

        $filePath = $dtoDir.'/'.$dtoClassName.'.php';
        file_put_contents($filePath, $dtoCode);

        $io->success("DTO généré avec succès : $filePath");

        return Command::SUCCESS;
    }

    private function generateDtoCode(
        string $namespace,
        string $className,
        array $properties,
        $metadata
    ): string {
        $code = "<?php\n\nnamespace $namespace;\n\n";
        $code .= "class $className\n{\n";

        // Propriétés
        foreach ($properties as $property) {
            $type = $this->getPropertyType($metadata, $property);
            $code .= "    private $type \$$property;\n\n";
        }

        // Constructeur
        $code .= "    public function __construct(\n";
        foreach ($properties as $property) {
            $type = $this->getPropertyType($metadata, $property);
            $code .= "        $type \$$property,\n";
        }
        $code .= "    ) {\n";
        foreach ($properties as $property) {
            $code .= "        \$this->$property = \$$property;\n";
        }
        $code .= "    }\n\n";

        // Getters
        foreach ($properties as $property) {
            $type = $this->getPropertyType($metadata, $property);
            $getter = 'get'.ucfirst($property);
            $code .= "    public function $getter(): $type\n";
            $code .= "    {\n";
            $code .= "        return \$this->$property;\n";
            $code .= "    }\n\n";
        }

        // Méthode statique de création depuis l'entité
        $code .= "    public static function fromEntity($metadata->name \$entity): self\n";
        $code .= "    {\n";
        $code .= "        return new self(\n";
        foreach ($properties as $property) {
            $getter = 'get'.ucfirst($property);
            $code .= "            \$entity->$getter(),\n";
        }
        $code .= "        );\n";
        $code .= "    }\n";

        $code .= "}\n";

        return $code;
    }

    private function getPropertyType($metadata, string $property): string
    {
        if (isset($metadata->fieldMappings[$property])) {
            return match ($metadata->fieldMappings[$property]['type']) {
                'string', 'text' => 'string',
                'integer' => 'int',
                'boolean' => 'bool',
                'datetime' => \DateTimeInterface::class,
                'float' => 'float',
                default => 'mixed'
            };
        }

        return 'mixed';
    }
}
