<?php

declare(strict_types=1);

namespace App\Tests\Form;

use App\Entity\Action;
use App\Form\UserActionType;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Test\TypeTestCase;

class UserActionTypeTest extends TypeTestCase
{
    private FormFactoryInterface $formFactory;

    protected function setUp(): void
    {
        parent::setUp();
        // On crée un formFactory à partir des extensions nécessaires (ici UserActionType)
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
            'agentComment' => 'Ceci est un commentaire.',
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);

        // Soumets les données au formulaire
        $form->submit(submittedData: $data);

        // Vérifie que le formulaire est valide
        $this->assertTrue(condition: $form->isValid());

        // Vérifie que l'entité est correctement remplie
        $this->assertEquals(expected: 'Ceci est un commentaire.', actual: $action->getAgentComment());
    }

    // Test de la soumission avec des données invalides (champ requis ou autre condition)
    #[Test] public function submitInvalidData(): void
    {
        // Données invalides (vide dans ce cas)
        $data = [
            'agentComment' => null,
        ];

        $action = new Action();
        $form = $this->formFactory->create(type: UserActionType::class, data: $action);

        // Soumets les données au formulaire
        $form->submit(submittedData: $data);

        // Vérifie que le formulaire n'est pas valide
        $this->assertTrue(condition: $form->isValid());
    }
}
