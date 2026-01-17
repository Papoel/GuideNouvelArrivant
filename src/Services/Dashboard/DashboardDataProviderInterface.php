<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;

/**
 * Interface for providing dashboard data.
 * This interface follows the Dependency Inversion Principle (DIP) by defining
 * a contract for data retrieval, allowing for different implementations.
 */
interface DashboardDataProviderInterface
{
    /**
     * Retrieves all dashboard data for a given user.
     *
     * @return array{
     *     logbooks: array<int, Logbook>,
     *     themes: array<int, Theme>,
     *     modules: array<int, Module>,
     *     actions: array<int, Action>
     * }
     */
    public function getDashboardDataForUser(User $user): array;
}
