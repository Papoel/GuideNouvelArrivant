<?php

declare(strict_types=1);

namespace App\Services\Mail;

use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookProgressService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;
use Twig\Environment;

class WeeklyReminderEmailService
{
    public function __construct(
        private readonly LogbookProgressService $logbookProgressService,
        private readonly LogbookRepository $logbookRepository,
        private readonly MailerInterface $mailer,
        private readonly Environment $twig,
    ) {}

    public function send(\DateTimeImmutable $triggeredAt): void
    {
        $logbooks = $this->logbookRepository->findAllWithOwnerAndMentor();
        $mentors = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

        foreach ($mentors['mentors_with_pending_modules'] as $mentorData) {
            $subject = 'Modules en attente de validation';

            // Déterminer le texte selon le nombre de modules
            $pendingModulesCount = $mentorData['pending_modules_count'];
            $numberText = $this->getNumberInFrench($pendingModulesCount);
            $modulesText = $pendingModulesCount > 1 ? 'modules' : 'module';
            $verbText = $pendingModulesCount > 1 ? 'sont' : 'est';

            // Définir le niveau d'urgence en fonction du nombre de modules
            $urgencyLevel = ['text' => '', 'class' => ''];
            if ($pendingModulesCount > 5) {
                $urgencyLevel = ['text' => 'Urgent', 'class' => 'urgent'];
            } elseif ($pendingModulesCount > 2) {
                $urgencyLevel = ['text' => 'Important', 'class' => 'important'];
            } else {
                $urgencyLevel = ['text' => 'Normal', 'class' => 'normal'];
            }

            // Création de l'email
            $email = (new Email())
                ->from('no-reply@gna.papoel.fr')
                ->to($mentorData['mentor_email'])
                ->subject($subject);

            // Recherche et intégration du logo
            $logoPath = __DIR__ . '/../../../public/images/logos/edf.png';
            $svgLogoPath = __DIR__ . '/../../../public/images/logos/edf.svg';
            $logo_cid = null;

            if (file_exists($logoPath)) {
                // Utiliser le logo PNG s'il existe
                $email->embedFromPath($logoPath, 'logo'); // Retourne l'objet Email, pas le CID
                $logo_cid = 'logo'; // Le CID est le nom utilisé comme second paramètre
            } elseif (file_exists($svgLogoPath)) {
                // Utiliser le logo SVG comme fallback
                $email->embedFromPath($svgLogoPath, 'logo', 'image/svg+xml');
                $logo_cid = 'logo'; // Même CID pour la cohérence
            }

            // Rendu du template avec le CID du logo
            $html = $this->twig->render(name: 'mail/mentorReminderEmailTemplate.html.twig', context: [
                'subject' => $subject,
                'mentor_firstname' => $mentorData['mentor_firstname'],
                'mentor_email' => $mentorData['mentor_email'],
                'mentor_nni' => $mentorData['mentor_nni'],
                'owner_fullname' => $mentorData['owner_fullname'],
                'pending_modules_count' => $pendingModulesCount,
                'number_text' => $numberText,
                'modules_text' => $modulesText,
                'verb_text' => $verbText,
                'triggeredAt' => $triggeredAt,
                'urgency_level' => $urgencyLevel,
                'logo_cid' => $logo_cid,
            ]);

            // Ajouter le contenu HTML à l'email
            $email->html($html);

            try {
                $this->mailer->send(message: $email);
            } catch (TransportExceptionInterface $e) {
                // Log de l'erreur à implémenter si nécessaire
            }
        }
    }

    /**
     * Convertit un nombre en français textuel
     */
    private function getNumberInFrench(int $number): string
    {
        return match ($number) {
            1 => 'un',
            2 => 'deux',
            3 => 'trois',
            4 => 'quatre',
            5 => 'cinq',
            6 => 'six',
            7 => 'sept',
            8 => 'huit',
            9 => 'neuf',
            10 => 'dix',
            11 => 'onze',
            12 => 'douze',
            13 => 'treize',
            14 => 'quatorze',
            15 => 'quinze',
            16 => 'seize',
            17 => 'dix-sept',
            18 => 'dix-huit',
            19 => 'dix-neuf',
            20 => 'vingt',
            21 => 'vingt et un',
            22 => 'vingt-deux',
            23 => 'vingt-trois',
            24 => 'vingt-quatre',
            25 => 'vingt-cinq',
            26 => 'vingt-six',
            27 => 'vingt-sept',
            28 => 'vingt-huit',
            29 => 'vingt-neuf',
            30 => 'trente',
            31 => 'trente et un',
            32 => 'trente-deux',
            33 => 'trente-trois',
            34 => 'trente-quatre',
            35 => 'trente-cinq',
            36 => 'trente-six',
            37 => 'trente-sept',
            38 => 'trente-huit',
            39 => 'trente-neuf',
            40 => 'quarante',
            41 => 'quarante et un',
            42 => 'quarante-deux',
            43 => 'quarante-trois',
            44 => 'quarante-quatre',
            45 => 'quarante-cinq',
            46 => 'quarante-six',
            47 => 'quarante-sept',
            48 => 'quarante-huit',
            49 => 'quarante-neuf',
            50 => 'cinquante',
            51 => 'cinquante et un',
            52 => 'cinquante-deux',
            53 => 'cinquante-trois',
            54 => 'cinquante-quatre',
            55 => 'cinquante-cinq',
            56 => 'cinquante-six',
            57 => 'cinquante-sept',
            58 => 'cinquante-huit',
            59 => 'cinquante-neuf',
            60 => 'soixante',
            61 => 'soixante et un',
            62 => 'soixante-deux',
            63 => 'soixante-trois',
            64 => 'soixante-quatre',
            65 => 'soixante-cinq',
            66 => 'soixante-six',
            67 => 'soixante-sept',
            68 => 'soixante-huit',
            69 => 'soixante-neuf',
            70 => 'soixante-dix',
            71 => 'soixante et onze',
            72 => 'soixante-douze',
            73 => 'soixante-treize',
            74 => 'soixante-quatorze',
            75 => 'soixante-cinq',
            76 => 'soixante-six',
            77 => 'soixante-sept',
            78 => 'soixante-huit',
            79 => 'soixante-neuf',
            80 => 'soixante-dix',
            81 => 'soixante et onze',
            82 => 'soixante-douze',
            83 => 'soixante-treize',
            84 => 'soixante-quatorze',
            85 => 'soixante-cinq',
            86 => 'soixante-six',
            87 => 'soixante-sept',
            88 => 'soixante-huit',
            89 => 'soixante-neuf',
            90 => 'soixante-dix',
            91 => 'soixante et onze',
            92 => 'soixante-douze',
            93 => 'soixante-treize',
            94 => 'soixante-quatorze',
            95 => 'soixante-cinq',
            96 => 'soixante-six',
            97 => 'soixante-sept',
            98 => 'soixante-huit',
            99 => 'soixante-neuf',
            100 => 'cent',
            default => (string) $number,
        };
    }
}
