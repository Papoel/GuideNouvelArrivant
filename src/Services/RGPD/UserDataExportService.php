<?php

declare(strict_types=1);

namespace App\Services\RGPD;

use App\Entity\User;
use App\Repository\ActionRepository;
use App\Repository\FeedbackRepository;
use App\Repository\LogbookRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Twig\Environment;

class UserDataExportService
{
    public function __construct(
        private readonly Environment $twig,
        private readonly LogbookRepository $logbookRepository,
        private readonly ActionRepository $actionRepository,
        private readonly FeedbackRepository $feedbackRepository,
    ) {
    }

    public function exportUserDataAsPdf(User $user): string
    {
        $userData = $this->collectUserData($user);

        $html = $this->twig->render('pdf/rgpd_export.html.twig', [
            'user' => $user,
            'data' => $userData,
            'exportDate' => new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris')),
        ]);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }

    /**
     * @return array{
     *     personal: array{firstname: string, lastname: string, email: ?string, nni: ?string},
     *     professional: array{job: string, speciality: string, service: string, hiringAt: ?\DateTimeImmutable, mentor: string},
     *     account: array{roles: list<string>, createdAt: ?\DateTimeImmutable, lastLoginAt: ?\DateTimeInterface},
     *     logbooks: list<array{name: string, themesCount: int<0, max>}>,
     *     actions: list<array{module: string, description: ?string, agentComment: ?string, agentValidatedAt: ?\DateTime, mentorComment: ?string, mentorValidatedAt: ?\DateTime}>,
     *     feedbacks: list<array{title: ?string, content: ?string, category: ?string, createdAt: ?\DateTimeImmutable, isReviewed: ?bool}>
     * }
     */
    private function collectUserData(User $user): array
    {
        $logbooks = $this->logbookRepository->findBy(['owner' => $user]);
        $feedbacks = $this->feedbackRepository->findBy(['author' => $user]);

        $actionsData = [];
        foreach ($logbooks as $logbook) {
            $actions = $this->actionRepository->findBy(['logbook' => $logbook, 'user' => $user]);
            foreach ($actions as $action) {
                $actionsData[] = [
                    'module' => $action->getModule()?->getTitle() ?? 'N/A',
                    'description' => $action->getDescription(),
                    'agentComment' => $action->getAgentComment(),
                    'agentValidatedAt' => $action->getAgentValidatedAt(),
                    'mentorComment' => $action->getMentorComment(),
                    'mentorValidatedAt' => $action->getMentorValidatedAt(),
                ];
            }
        }

        $feedbacksData = [];
        foreach ($feedbacks as $feedback) {
            $feedbacksData[] = [
                'title' => $feedback->getTitle(),
                'content' => $feedback->getContent(),
                'category' => $feedback->getCategory(),
                'createdAt' => $feedback->getCreatedAt(),
                'isReviewed' => $feedback->isReviewed(),
            ];
        }

        return [
            'personal' => [
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname(),
                'email' => $user->getEmail(),
                'nni' => $user->getNni(),
            ],
            'professional' => [
                'job' => $user->getJob()?->getName() ?? 'Non renseigné',
                'speciality' => $user->getSpeciality()?->getName() ?? 'Non renseignée',
                'service' => $user->getService()?->getName() ?? 'Non renseigné',
                'hiringAt' => $user->getHiringAt(),
                'mentor' => $user->getMentor()?->getFullname() ?? 'Non assigné',
            ],
            'account' => [
                'roles' => $user->getRoles(),
                'createdAt' => $user->getCreatedAt(),
                'lastLoginAt' => $user->getLastLoginAt(),
            ],
            'logbooks' => array_map(fn($lb) => [
                'name' => $lb->getName() ?? 'Carnet sans nom',
                'themesCount' => $lb->getThemes()->count(),
            ], $logbooks),
            'actions' => $actionsData,
            'feedbacks' => $feedbacksData,
        ];
    }
}
