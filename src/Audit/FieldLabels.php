<?php

declare(strict_types=1);

namespace App\Audit;

use App\Entity\Action;
use App\Entity\AuditLog;
use App\Entity\Backup;
use App\Entity\DeletionRequest;
use App\Entity\Feedback;
use App\Entity\Job;
use App\Entity\Logbook;
use App\Entity\LogbookTemplate;
use App\Entity\Module;
use App\Entity\Service;
use App\Entity\Speciality;
use App\Entity\Theme;
use App\Entity\User;

/** Traduit les noms de champs des entités en libellés français pour le journal d'audit. */
final class FieldLabels
{
    /** @var array<class-string, array<string, string>> */
    private const MAP = [
        User::class => [
            'firstname' => 'Prénom',
            'lastname' => 'Nom',
            'email' => 'Email',
            'nni' => 'NNI',
            'mentor' => 'Tuteur',
            'job' => 'Métier',
            'speciality' => 'Spécialité',
            'hiringAt' => 'Prise de poste',
            'lastLoginAt' => 'Dernière connexion',
            'logbooks' => 'Carnets',
            'feedbacks' => 'Retours d\'expérience',
        ],
        Service::class => [
            'name' => 'Nom',
            'chef' => 'Chef de service',
        ],
        Logbook::class => [
            'name' => 'Nom',
            'owner' => 'Propriétaire',
            'themes' => 'Thèmes',
        ],
        LogbookTemplate::class => [
            'name' => 'Nom',
            'themes' => 'Thèmes',
            'jobs' => 'Métiers',
        ],
        Theme::class => [
            'title' => 'Titre',
            'modules' => 'Modules',
            'logbooks' => 'Carnets',
        ],
        Module::class => [
            'title' => 'Titre',
            'theme' => 'Thème',
        ],
        Action::class => [
            'user' => 'Utilisateur',
            'module' => 'Module',
            'logbook' => 'Carnet',
            'agentValidatedAt' => 'Validée par l\'agent le',
            'mentorValidatedAt' => 'Validée par le tuteur le',
            'mentorVisa' => 'Visa du tuteur',
            'mentorComment' => 'Commentaire du tuteur',
            'mentorCommentedAt' => 'Commentée le',
        ],
        Feedback::class => [
            'author' => 'Auteur',
            'isReviewed' => 'Traité',
            'managerComment' => 'Commentaire du manager',
            'reviewedBy' => 'Traité par',
            'reviewAt' => 'Traité le',
        ],
        DeletionRequest::class => [
            'user' => 'Utilisateur',
            'requestedBy' => 'Demandé par',
            'requestedAt' => 'Demandé le',
            'scheduledDeletionAt' => 'Suppression prévue le',
            'cancelledAt' => 'Annulé le',
            'processedAt' => 'Traité le',
            'userInfo' => 'Informations utilisateur',
        ],
        Job::class => [
            'name' => 'Nom',
            'code' => 'Code',
        ],
        Speciality::class => [
            'name' => 'Nom',
            'code' => 'Code',
        ],
        Backup::class => [
            'type' => 'Type',
            'filename' => 'Nom du fichier',
            'filepath' => 'Chemin',
            'filesize' => 'Taille',
            'checksum' => 'Somme de contrôle',
        ],
    ];

    /** Libellés génériques valables pour toute entité. */
    private const GENERIC = [
        'id' => 'ID',
        'name' => 'Nom',
        'title' => 'Titre',
        'description' => 'Description',
        'createdAt' => 'Créé le',
        'updatedAt' => 'Modifié le',
        'roles' => 'Rôles',
        'service' => 'Service',
        'owner' => 'Propriétaire',
        'user' => 'Utilisateur',
        'email' => 'Email',
    ];

    public static function label(string $entityClass, string $field): string
    {
        return self::MAP[$entityClass][$field]
            ?? self::GENERIC[$field]
            ?? self::humanize($field);
    }

    private static function humanize(string $field): string
    {
        $text = strtolower((string) preg_replace('/(?<!^)[A-Z]/', ' $0', $field));

        return ucfirst($text);
    }
}
