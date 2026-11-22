<?php

declare(strict_types=1);

namespace App\Services\Admin\Users;

use App\Entity\Logbook;
use App\Entity\User;
use App\Services\Admin\Logbooks\LogbookArchiveService;
use Doctrine\ORM\EntityManagerInterface;

/** Service unique de suppression d'utilisateur.
 *
 * Règle d'or : jamais de suppression sans archivage préalable des carnets —
 * un carnet de compagnonnage est un document probant dont la perte est
 * irréversible (incident remonté par le client : suppression du tuteur ayant
 * fait disparaître validations et commentaires des carnets archivés).
 *
 * Toutes les suppressions passent par ce service : archivage et suppression
 * sont exécutés dans le même flush, donc dans la même transaction.
 */
readonly class UserDeletionService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LogbookArchiveService $logbookArchiveService,
    ) {
    }

    /** Supprime un utilisateur, ses carnets (préalablement archivés) et ses
     * actions : la copie archivée remplace définitivement les données vivantes.
     *
     * @param User      $user  Utilisateur à supprimer
     * @param User|null $actor Auteur de la suppression (tracé dans l'archive)
     */
    public function deleteUserOnly(User $user, ?User $actor = null): void
    {
        $this->archiveUserLogbooks($user, $actor);
        $this->removeOrphanActions($user);

        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    /** Alias historique : avec l'archivage, « tout supprimer » et « supprimer
     * l'utilisateur » produisent le même résultat — les carnets sont de toute
     * façon conservés dans l'archive. */
    public function deleteUserAndLogbooks(User $user, ?User $actor = null): void
    {
        $this->deleteUserOnly($user, $actor);
    }

    /** Supprime les carnets d'un utilisateur (archivés au préalable) en
     * conservant le compte.
     *
     * @param User      $user  Propriétaire des carnets
     * @param User|null $actor Auteur de la suppression
     */
    public function deleteLogbooksOnly(User $user, ?User $actor = null): void
    {
        foreach ($user->getLogbooks()->toArray() as $logbook) {
            $this->logbookArchiveService->archiveLogbook($logbook, $actor);
            // Les thèmes sont partagés entre carnets : on détache la liaison,
            // les actions partent en cascade remove avec le carnet.
            foreach ($logbook->getThemes()->toArray() as $theme) {
                $logbook->removeTheme($theme);
            }
            $this->entityManager->remove($logbook);
        }

        $this->entityManager->flush();
    }

    /** Supprime un seul carnet (archivé au préalable) en conservant le compte.
     *
     * @param Logbook   $logbook Carnet à supprimer
     * @param User|null $actor   Auteur de la suppression
     */
    public function deleteLogbook(Logbook $logbook, ?User $actor = null): void
    {
        $this->logbookArchiveService->archiveLogbook($logbook, $actor);
        foreach ($logbook->getThemes()->toArray() as $theme) {
            $logbook->removeTheme($theme);
        }

        $this->entityManager->remove($logbook);
        $this->entityManager->flush();
    }

    /** Fige chaque carnet du titulaire dans une archive avant sa suppression. */
    private function archiveUserLogbooks(User $user, ?User $actor): void
    {
        foreach ($user->getLogbooks() as $logbook) {
            $this->logbookArchiveService->archiveLogbook($logbook, $actor);
            // Détache les thèmes partagés avant suppression en cascade du
            // carnet (même précaution que dans deleteLogbooksOnly).
            foreach ($logbook->getThemes()->toArray() as $theme) {
                $logbook->removeTheme($theme);
            }
        }
    }

    /** Les actions non rattachées à un carnet n'ont aucune valeur d'archive et
     * bloquent la suppression : actions.user_id est NOT NULL (FK RESTRICT).
     * Elles sont donc supprimées explicitement — les actions de carnet, elles,
     * partent via le cascade remove du carnet. */
    private function removeOrphanActions(User $user): void
    {
        foreach ($user->getActions() as $action) {
            if (null === $action->getLogbook()) {
                $this->entityManager->remove($action);
            }
        }
    }
}
