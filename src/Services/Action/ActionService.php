<?php

declare(strict_types=1);

namespace App\Services\Action;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\User;
use App\Repository\ActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RequestStack;

readonly class ActionService
{
    public function __construct(
        private readonly ActionRepository $actionRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly Security $security,
        private readonly RequestStack $requestStack,
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
        $action = $this->actionRepository->findOneBy(
            [
            'module' => $module,
            'user' => $currentUser,
            ]
        );

        // Si aucune action n'est trouvée, créer une nouvelle action
        if (!$action) {
            $action = new Action();
            $action->setModule($module);
            $action->setUser($currentUser);  // Passer l'utilisateur validé
        }

        return $action;
    }

    public function validateAction(Action $action): void
    {
        $currentUser = $this->security->getUser();

        if (!$currentUser instanceof User) {
            throw new \LogicException(message: 'L\'utilisateur actuel n\'est pas valide.');
        }

        $agentVisa = 'Validation numérique de ' . $currentUser->getFullName() . ' le ' . (new \DateTime())->format(format: 'd/m/Y');
        $action->setAgentVisa($agentVisa);

        $date = new \DateTime(datetime: 'now', timezone: new \DateTimeZone(timezone: 'Europe/Paris'));
        $action->setAgentValidatedAt($date);
        $action->setAgentComment(agentComment: null); // Pas de commentaire

        $this->entityManager->persist($action);
        $this->entityManager->flush();
    }

    public function saveAction(Action $action, string $agentName, string $logbookId): void
    {
        $currentDate = new \DateTime(datetime: 'now', timezone: new \DateTimeZone(timezone: 'Europe/Paris'));

        // Récupérer la requête actuelle
        $currentRequest = $this->requestStack->getCurrentRequest();

        // S'assurer que la requête n'est pas nulle avant d'appeler get()
        if ($currentRequest) {
            $currentLogbookId = $currentRequest->get(key: 'logbookId');
        }

        // Récupérer le carnet de l'utilisateur à partir de l'ID fourni
        $userLogbook = $this->entityManager->getRepository(Logbook::class)->find($logbookId);

        if ($agentName) {
            $action->setAgentVisa(agentVisa: 'Visa numérique de ' . $agentName . ' le ' . $currentDate->format(format: 'd/m/Y à H:i'));
        }

        // Vérifier si le carnet est déjà assigné à l'action
        if (!$action->getLogbook()) {
            $action->setLogbook(logbook: $userLogbook);
        }

        $formattedDate = $currentDate->format(format: 'd/m/Y'); // Formate la date comme tu le souhaites
        $action->setAgentValidatedAt($currentDate);

        $this->entityManager->persist($action);
        $this->entityManager->flush();
    }
}
