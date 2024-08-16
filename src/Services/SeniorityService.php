<?php

declare(strict_types=1);

namespace App\Services;

class SeniorityService
{
    public function getSeniority(\DateTimeInterface $hiringAt): string
    {
        $now = new \DateTime();
        $interval = $now->diff($hiringAt);

        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;

        $seniority = '';

        if ($years > 0) {
            $seniority .= $years.' année'.($years > 1 ? 's' : '').' ';
        }

        $seniority .= $months.' mois ';

        if ($days > 0) {
            $seniority .= $days.' jour'.($days > 1 ? 's' : '').' ';
        }

        return $seniority;
    }
}
