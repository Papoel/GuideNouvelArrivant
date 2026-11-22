<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Réparation du schéma d'archivage après une restauration de dump.
 *
 * Un restore écrase les tables du dump mais laisse les tables locales absentes
 * du dump (logbook_archives) et peut régresser la table des versions de
 * migration. Cette migration applique de façon idempotente ce qui devrait
 * exister : sur un environnement sain, elle ne fait strictement rien.
 */
final class Version20261122150000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Répare idempotentement le schéma archives/mentor_name après une restauration de dump';
    }

    public function up(Schema $schema): void
    {
        if (!$this->tableExists('logbook_archives')) {
            $this->addSql('CREATE TABLE logbook_archives (id BINARY(16) NOT NULL, owner_firstname VARCHAR(50) NOT NULL, owner_lastname VARCHAR(50) NOT NULL, owner_nni VARCHAR(6) DEFAULT NULL, owner_email VARCHAR(180) DEFAULT NULL, owner_service VARCHAR(100) DEFAULT NULL, owner_job VARCHAR(100) DEFAULT NULL, hiring_at DATETIME DEFAULT NULL, mentor_name VARCHAR(255) DEFAULT NULL, payload JSON NOT NULL, pdf MEDIUMTEXT, pdf_filename VARCHAR(255) DEFAULT NULL, archived_at DATETIME NOT NULL, archived_by VARCHAR(255) DEFAULT NULL, expires_at DATETIME NOT NULL, warning_sent_at DATETIME DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        } elseif (!$this->columnExists('logbook_archives', 'warning_sent_at')) {
            $this->addSql('ALTER TABLE logbook_archives ADD warning_sent_at DATETIME DEFAULT NULL');
        }

        if (!$this->columnExists('logbooks', 'mentor_name')) {
            $this->addSql('ALTER TABLE logbooks ADD mentor_name VARCHAR(255) DEFAULT NULL');
        }

        // Backfill : fige le nom du tuteur actuel sur les carnets existants
        // (format identique à User::getFullname()).
        $this->addSql(<<<'SQL'
            UPDATE logbooks l
            JOIN users o ON l.owner_id = o.id
            JOIN users m ON o.mentor_id = m.id
            SET l.mentor_name = CONCAT(UCASE(LEFT(m.firstname, 1)), SUBSTRING(m.firstname, 2), ' ', UCASE(m.lastname))
            WHERE l.mentor_name IS NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // Volontairement vide : cette migration ne fait que réparer un état
        // qui aurait dû exister — il n'y a rien à « défaire ».
    }

    private function tableExists(string $table): bool
    {
        return (bool) $this->connection->fetchOne(
            'SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = :table',
            ['table' => $table],
        );
    }

    private function columnExists(string $table, string $column): bool
    {
        return (bool) $this->connection->fetchOne(
            'SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = :table AND column_name = :column',
            ['table' => $table, 'column' => $column],
        );
    }
}
