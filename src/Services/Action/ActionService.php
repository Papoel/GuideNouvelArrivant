<?php

declare(strict_types=1);

namespace App\Services\Action;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\User;
use App\Repository\ActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;

readonly class ActionService
{
    public function __construct(
        private readonly ActionRepository $actionRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly Security $security,
    ) {
    }

    public function findOrCreateAction(Module $module): Action
    {
        $currentUser = $this->security->getUser();

        // Vérifier si l'utilisateur est bien une instance de App\Entity\User
        if (!$currentUser instanceof User) {
            throw new \LogicException(message: 'L\'utilisateur actuel n\'est pas valide.');
        }

        // Rechercher une action par module en fonction de l'utilisateur connecté
        $action = $this->actionRepository->findOneBy([
            'module' => $module,
            'user' => $currentUser,
        ]);

        // Si aucune action n'est trouvée, créer une nouvelle action
        if (!$action) {
            $action = new Action();
            $action->setModule($module);
            $action->setUser($currentUser);  // Passer l'utilisateur validé
        }

        return $action;
    }

    public function saveAction(Action $action, string $agentName): void
    {
        $currentDate = new \DateTime(datetime: 'now', timezone: new \DateTimeZone(timezone: 'Europe/Paris'));

        if ($agentName) {
            $action->setAgentVisa(agentVisa: 'Visa numérique de '.$agentName.' le '.$currentDate->format(format: 'd/m/Y à H:i'));
        }

        $this->entityManager->persist($action);
        $this->entityManager->flush();
    }
}
