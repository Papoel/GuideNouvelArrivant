<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\User;
use App\Form\MentorActionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;

#[AsLiveComponent]
class ActionForm extends AbstractController
{
    use ComponentWithFormTrait;
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    #[LiveProp(writable: true)]
    public ?Module $module = null;

    #[LiveProp(writable: true)]
    public ?int $actionId = null;

    #[LiveProp(writable: true)]
    public ?Action $initialFormData = null;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    protected function instantiateForm(): FormInterface
    {
        $action = new Action();

        $this->initialFormData = $action;

        $action = null !== $this->actionId
            ? $this->entityManager->getRepository(Action::class)->find($this->actionId)
            : new Action();

        // Vérifier si l'action est null avant d'appeler setModule()
        if (null !== $action && null !== $this->module) {
            $action->setModule($this->module);
        }

        return $this->createForm(
            type: MentorActionType::class,
            data: $action
        );
    }

    #[LiveAction]
    public function save(): Response
    {
        // Valide les données du formulaire après soumission
        $this->validate();

        // Soumet le formulaire et met à jour les propriétés du composant
        $this->submitForm();

        // TODO: Retirer après avoir corrigé le bug
        if (!$this->getForm()->isSubmitted() || !$this->getForm()->isValid()) {
            throw new \RuntimeException(message: 'Le formulaire n\'est pas valide.');
        }

        /** @var Action $action */
        $action = $this->getForm()->getData();

        // Définir le module sur l'action si $this->module est défini
        if (null !== $this->module) {
            $action->setModule($this->module);
        }

        $this->entityManager->persist(object: $action);
        $this->entityManager->flush();

        /** @var User $currentUser */
        $currentUser = $this->getUser();
        $nni = $currentUser->getNni();

        return $this->redirectToRoute(
            route: 'dashboard_index',
            parameters: [
            'nni' => $nni,
            ]
        );
    }
}
