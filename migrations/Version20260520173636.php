<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260520173636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE logbook_templates ADD is_global TINYINT(1) DEFAULT 0 NOT NULL');

        // Vérifier si la colonne existe avant de la supprimer
        $this->addSql('SET @col_exists = (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = "users" AND COLUMN_NAME = "job_position")');
        $this->addSql('SET @query = IF(@col_exists > 0, "ALTER TABLE users DROP COLUMN job_position", "SELECT 1")');
        $this->addSql('PREPARE stmt FROM @query');
        $this->addSql('EXECUTE stmt');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `users` ADD job_position VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE `logbook_templates` DROP is_global');
    }
}
