<?php

declare(strict_types=1);

namespace App\Tests\Form;

use App\Entity\Action;
use App\Form\UserActionType;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Validator\Validation;

class UserActionTypeTest extends TypeTestCase
{
    private FormFactoryInterface $formFactory;

    protected function getExtensions(): array
    {
        $validator = Validation::createValidator();

        return [
            new ValidatorExtension($validator),
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->formFactory = $this->factory;
    }

    // Test de la construction du formulaire
    #[Test] public function buildForm(): void
    {
        // Crée une instance de ton formulaire
        $form = $this->formFactory->create(type: UserActionType::class);

        // Vérifie que les champs existent dans le formulaire
        self::assertTrue(condition: $form->has(name: 'agentComment'));
        self::assertTrue(condition: $form->has(name: 'submit'));

        // Vérifie les options des champs
        self::assertEquals(
            expected: 'Commentaires',
            actual: $form
                ->get('agentComment')
                ->getConfig()
                ->getOption(name: 'label')
        );
        self::assertEquals(
            expected: 5,
            actual: $form
                ->get('agentComment')
                ->getConfig()
                ->getOption(name: 'attr')['rows']
        );
        self::assertFalse(
            condition: $form
                ->get('agentComment')
                ->getConfig()
                ->getOption(name: 'required')
        );
        self::assertEquals(
            expected: 'Sauvegarder',
            actual: $form
                ->get('submit')
                ->getConfig()
                ->getOption(name: 'label')
        );
        self::assertEquals(
            expected: 'btn btn-sm btn-primary',
            actual: $form
                ->get('submit')
                ->getConfig()
                ->getOption(name: 'attr')['class']
        );
    }

    // Test de la soumission avec des données valides
    #[Test] public function submitValidData(): void
    {
        // Crée des données valides pour l'entité Action
        $data = [
            'agentComment' => 'Ceci est un commentaire valide avec une longueur suffisante.',
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);

        // Soumets les données au formulaire
        $form->submit(submittedData: $data);

        // Vérifie que le formulaire est valide
        $this->assertTrue($form->isValid());
        $this->assertTrue($form->isSynchronized());

        // Vérifie que l'entité est correctement remplie
        $this->assertEquals(
            expected: 'Ceci est un commentaire valide avec une longueur suffisante.',
            actual: $action->getAgentComment()
        );
    }

    #[Test]
    public function submitCommentTooShort(): void
    {
        $data = [
            'agentComment' => 'a', // Moins de 2 caractères
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);
        $form->submit(submittedData: $data);

        $this->assertFalse($form->isValid());
        $this->assertTrue($form->isSynchronized());
        
        $errors = $form->get('agentComment')->getErrors();
        $this->assertGreaterThan(0, count($errors));
        
        $errorMessages = array_map(fn($error) => $error->getMessage(), iterator_to_array($errors));
        $this->assertContains(
            'Le commentaire doit faire au moins 2 caractères',
            $errorMessages
        );
    }

    #[Test]
    public function submitCommentTooLong(): void
    {
        $data = [
            'agentComment' => str_repeat('a', 1001), // Plus de 1000 caractères
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);
        $form->submit(submittedData: $data);

        $this->assertFalse($form->isValid());
        $this->assertTrue($form->isSynchronized());
        
        $errors = $form->get('agentComment')->getErrors();
        $this->assertGreaterThan(0, count($errors));
        
        $errorMessages = array_map(fn($error) => $error->getMessage(), iterator_to_array($errors));
        $this->assertContains(
            'Le commentaire ne peut pas dépasser 1000 caractères',
            $errorMessages
        );
    }

    #[Test]
    public function submitInvalidType(): void
    {
        $data = [
            'agentComment' => fopen('php://memory', 'r'), // Une ressource ne peut pas être convertie en chaîne
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);
        
        $this->expectException(\Symfony\Component\PropertyAccess\Exception\InvalidTypeException::class);
        $this->expectExceptionMessage('Expected argument of type "?string", "resource" given at property path "agentComment"');
        $form->submit(submittedData: $data);
    }

    // Test de la soumission avec des données invalides (champ vide)
    #[Test] 
    public function submitEmptyData(): void
    {
        $data = [
            'agentComment' => '',
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);

        // Soumets les données au formulaire
        $form->submit(submittedData: $data);

        // Vérifie que le formulaire n'est pas valide
        $this->assertFalse($form->isValid());
        $this->assertTrue($form->isSynchronized());
        
        $errors = $form->get('agentComment')->getErrors();
        $this->assertGreaterThan(0, count($errors));
        
        $errorMessages = array_map(fn($error) => $error->getMessage(), iterator_to_array($errors));
        $this->assertContains(
            'Un commentaire est requis, merci de laissé un petit mot à ton tuteur.',
            $errorMessages
        );
    }

    // Test de la soumission avec des données nulles
    #[Test] 
    public function submitNullData(): void
    {
        $data = [
            'agentComment' => null,
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);

        // Soumets les données au formulaire
        $form->submit(submittedData: $data);

        // Vérifie que le formulaire n'est pas valide
        $this->assertFalse($form->isValid());
        $this->assertTrue($form->isSynchronized());
        
        $errors = $form->get('agentComment')->getErrors();
        $this->assertGreaterThan(0, count($errors));
        
        $errorMessages = array_map(fn($error) => $error->getMessage(), iterator_to_array($errors));
        $this->assertContains(
            'Un commentaire est requis, merci de laissé un petit mot à ton tuteur.',
            $errorMessages
        );
    }
}
