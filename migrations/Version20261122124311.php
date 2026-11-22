<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261122124311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE logbook_archives (id BINARY(16) NOT NULL, owner_firstname VARCHAR(50) NOT NULL, owner_lastname VARCHAR(50) NOT NULL, owner_nni VARCHAR(6) DEFAULT NULL, owner_email VARCHAR(180) DEFAULT NULL, owner_service VARCHAR(100) DEFAULT NULL, owner_job VARCHAR(100) DEFAULT NULL, hiring_at DATETIME DEFAULT NULL, mentor_name VARCHAR(255) DEFAULT NULL, payload JSON NOT NULL, pdf MEDIUMTEXT, pdf_filename VARCHAR(255) DEFAULT NULL, archived_at DATETIME NOT NULL, archived_by VARCHAR(255) DEFAULT NULL, expires_at DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE logbooks ADD mentor_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE logbook_archives');
        $this->addSql('ALTER TABLE `logbooks` DROP mentor_name');
    }
}
