<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\User;
use App\Form\ActionFormType;
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
        $action = null !== $this->actionId
            ? $this->entityManager->getRepository(Action::class)->find($this->actionId)
            : new Action();

        return $this->createForm(type: ActionFormType::class, data: $action);
    }

    #[LiveAction]
    public function save(): Response
    {
        $this->validate();
        $this->submitForm();

        $action = $this->getForm()->getData();

        if (!$action instanceof Action) {
            throw new \LogicException(message: 'Une erreur est survenue lors de la sauvegarde de l\'action.');
        }

        $this->entityManager->persist(object: $action);
        $this->entityManager->flush();

        /** @var User $currentUser */
        $currentUser = $this->getUser();
        $nni = $currentUser->getNni();

        return $this->redirectToRoute(route: 'dashboard_index', parameters: [
            'nni' => $nni,
        ]);
    }

    #[LiveAction]
    public function edit(int $actionId): void
    {
        $this->actionId = $actionId;
        $this->initialFormData = $this->entityManager->getRepository(Action::class)->find($actionId);
    }
}
