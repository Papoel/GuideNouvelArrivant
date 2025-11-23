<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

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
     *     logbooks: array,
     *     themes: array,
     *     modules: array,
     *     actions: array
     * }
     */
    public function getDashboardDataForUser(User $user): array;
}
