<?php

declare(strict_types=1);

namespace App\Services\User;

class UserSeniorityService
{
    public function getSeniority(\DateTimeInterface $hiringAt): string
    {
        $now = new \DateTime();

        // Si la date d'embauche est aujourd'hui, on retourne un message sympathique
        if ($hiringAt->format(format: 'Y-m-d') === $now->format(format: 'Y-m-d')) {
            return 'Premier jour parmi nous !';
        }

        $interval = $now->diff($hiringAt);

        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;

        $seniority = '';

        // Ajouter les années si elles existent
        if ($years > 0) {
            $seniority .= $years.' année'.($years > 1 ? 's' : '').' ';
        }

        // Ajouter les mois seulement s'il y a des années ou si les mois ne sont pas nuls
        if ($months > 0 || (0 === $years && 0 === $months && 0 === $days)) {
            $seniority .= $months.' mois ';
        }

        // Ajouter les jours si c'est la seule information, ou s'ils sont non nuls
        if ($days > 0 || (0 === $years && 0 === $months)) {
            $seniority .= $days.' jour'.($days > 1 ? 's' : '').' ';
        }

        // Retirer l'espace en fin de chaîne
        return trim($seniority);
    }
}
