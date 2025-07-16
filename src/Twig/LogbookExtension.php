<?php

declare(strict_types=1);

namespace App\Twig;

use App\Entity\Logbook;
use App\Entity\Theme;
use App\Services\Logbook\LogbookThemeService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class LogbookExtension extends AbstractExtension
{
    public function __construct(
        private readonly LogbookThemeService $logbookThemeService
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('theme_has_actions', [$this, 'themeHasActions']),
        ];
    }

    /**
     * Vérifie si un thème a des actions associées dans un carnet
     *
     * @param Logbook $logbook Le carnet concerné
     * @param Theme $theme Le thème à vérifier
     * @param bool $checkUserActions Si true, vérifie uniquement les actions de l'utilisateur propriétaire du carnet
     *
     * @return bool True si des actions existent, false sinon
     */
    public function themeHasActions(Logbook $logbook, Theme $theme, bool $checkUserActions = false): bool
    {
        $user = $checkUserActions ? $logbook->getOwner() : null;
        return $this->logbookThemeService->hasThemeActions($logbook, $theme, $user);
    }
}
