<?php

declare(strict_types=1);

namespace App\Tests\Form;

use App\Entity\Action;
use App\Form\MentorActionType;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Test\TypeTestCase;

class MentorActionTypeTest extends TypeTestCase
{
    private FormFactoryInterface $formFactory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->formFactory = $this->factory;
    }

    #[Test] public function buildForm(): void
    {
        $form = $this->formFactory->create(type: MentorActionType::class);

        self::assertTrue(condition: $form->has(name: 'mentorComment'));
        self::assertTrue(condition: $form->has(name: 'submit'));

        self::assertEquals(
            expected: 'Commentaires',
            actual: $form
                ->get('mentorComment')
                ->getConfig()
                ->getOption(name: 'label')
        );
        self::assertEquals(
            expected: 5,
            actual: $form
                ->get('mentorComment')
                ->getConfig()
                ->getOption(name: 'attr')['rows']
        );
        self::assertFalse(
            condition: $form
                ->get('mentorComment')
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
    }

    // Test de la soumission avec des données valides
    #[Test] public function submitValidData(): void
    {
        $formData = [
            'mentorComment' => 'Commentaire de mentor',
        ];

        // Crée une instance de l'entité
        $action = new Action();

        // Crée une instance du formulaire
        $form = $this->formFactory->create(type: MentorActionType::class, data: $action);

        // Soumets les données au formulaire
        $form->submit(submittedData: $formData);

        // Vérifie que le formulaire est valide
        $this->assertTrue(condition: $form->isValid());

        // Vérifie que les données ont été soumises
        $this->assertEquals(
            expected: 'Commentaire de mentor',
            actual: $action->getMentorComment()
        );
    }

    // Test de la soumission avec des données invalides (champ requis ou autre condition)
    #[Test] public function submitInvalidData(): void
    {
        // Données invalides (vide dans ce cas)
        $formData = [
            'mentorComment' => null,
        ];

        // Crée une instance de l'entité
        $action = new Action();

        // Crée une instance du formulaire
        $form = $this->formFactory->create(type: MentorActionType::class, data: $action);

        // Soumets les données au formulaire
        $form->submit(submittedData: $formData);

        // Vérifie que le formulaire n'est pas valide
        // - Je n'ai pas de contrainte de validation sur le champ mentorComment
        // - Le formulaire est donc valide
        $this->assertTrue(condition: $form->isValid());
    }
}
