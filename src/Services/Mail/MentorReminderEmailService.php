<?php

declare(strict_types=1);

namespace App\Services\Mail;

/**
 * Service pour préparer les données des emails de rappel pour les mentors
 */
final class MentorReminderEmailService
{
    /**
     * Prépare les données pour un mentor spécifique
     *
     * @param array{mentor_email: string, mentor_firstname: string, owner_fullname: string, pending_modules_count: int, mentor_nni: ?string} $mentorData
     * @return array{mentor_firstname: string, mentor_email: string, mentor_nni: ?string, owner_fullname: string, pending_modules_count: int, modules_text: string, verb_text: string, number_text: string, urgency_level: array{level: string, color: string, text: string, class: string}, subject: string}
     */
    public function prepareReminderData(array $mentorData): array
    {
        $pendingCount = (int) $mentorData['pending_modules_count'];

        return [
            'mentor_firstname' => $mentorData['mentor_firstname'],
            'mentor_email' => $mentorData['mentor_email'],
            'mentor_nni' => $mentorData['mentor_nni'] ?? null,
            'owner_fullname' => $mentorData['owner_fullname'],
            'pending_modules_count' => $pendingCount,
            'modules_text' => $pendingCount > 1 ? 'modules' : 'module',
            'verb_text' => $pendingCount > 1 ? 'sont' : 'est',
            'number_text' => $this->convertNumberToText($pendingCount),
            'urgency_level' => $this->getUrgencyLevel($pendingCount),
            'subject' => $this->generateSubject($pendingCount),
        ];
    }

    /**
     * Prépare les données pour tous les mentors
     *
     * @param array{mentors_with_pending_modules: array<string, array{mentor_email: string, mentor_firstname: string, owner_fullname: string, pending_modules_count: int, mentor_nni: ?string}>} $mentorsWithPending
     * @return array<int, array{mentor_firstname: string, mentor_email: string, mentor_nni: ?string, owner_fullname: string, pending_modules_count: int, modules_text: string, verb_text: string, number_text: string, urgency_level: array{level: string, color: string, text: string, class: string}, subject: string}>
     */
    public function prepareAllRemindersData(array $mentorsWithPending): array
    {
        $reminders = [];

        /** @var array<string, array{mentor_email: string, mentor_firstname: string, owner_fullname: string, pending_modules_count: int, mentor_nni: ?string}> $mentorsData */
        $mentorsData = $mentorsWithPending['mentors_with_pending_modules'];
        foreach ($mentorsData as $mentorEmail => $mentorData) {
            $reminders[] = $this->prepareReminderData($mentorData);
        }

        return $reminders;
    }

    /**
     * Génère le sujet de l'email
     */
    private function generateSubject(int $pendingCount): string
    {
        $moduleText = $pendingCount > 1 ? 'modules' : 'module';
        $numberText = $this->convertNumberToText($pendingCount);

        return sprintf("Rappel - %s %s en attente de validation", $numberText, $moduleText);
    }

    /**
     * Détermine le niveau d'urgence
     * 
     * @return array{level: string, color: string, text: string, class: string}
     */
    private function getUrgencyLevel(int $pendingCount): array
    {
        if ($pendingCount >= 5) {
            return [
                'level' => 'urgent',
                'color' => '#dc3545',
                'text' => 'Urgent',
                'class' => 'urgent'
            ];
        } elseif ($pendingCount >= 3) {
            return [
                'level' => 'important',
                'color' => '#fd7e14',
                'text' => 'Important',
                'class' => 'important'
            ];
        } else {
            return [
                'level' => 'normal',
                'color' => '#198754',
                'text' => '',
                'class' => 'normal'
            ];
        }
    }

    /**
     * Convertit un nombre en texte français
     */
    private function convertNumberToText(int $number): string
    {
        $numbers = [
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
            75 => 'soixante-quinze',
            76 => 'soixante-seize',
            77 => 'soixante-dix-sept',
            78 => 'soixante-dix-huit',
            79 => 'soixante-dix-neuf',
            80 => 'quatre-vingt',
            81 => 'quatre-vingt et un',
            82 => 'quatre-vingt-deux',
            83 => 'quatre-vingt-trois',
            84 => 'quatre-vingt-quatre',
            85 => 'quatre-vingt-cinq',
            86 => 'quatre-vingt-six',
            87 => 'quatre-vingt-sept',
            88 => 'quatre-vingt-huit',
            89 => 'quatre-vingt-neuf',
            90 => 'quatre-vingt-dix',
            91 => 'quatre-vingt et onze',
            92 => 'quatre-vingt-douze',
            93 => 'quatre-vingt-treize',
            94 => 'quatre-vingt-quatorze',
            95 => 'quatre-vingt-quinze',
            96 => 'quatre-vingt-seize',
            97 => 'quatre-vingt-dix-sept',
            98 => 'quatre-vingt-dix-huit',
            99 => 'quatre-vingt-dix-neuf',
            100 => 'cent',
        ];

        return $numbers[$number] ?? (string) $number;
    }
}
