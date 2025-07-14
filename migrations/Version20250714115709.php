<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250714115709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `logbook_templates` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, is_default TINYINT(1) NOT NULL, jobs JSON NOT NULL COMMENT \'(DC2Type:json)\', created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logbook_template_theme (logbook_template_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', theme_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_991E5CD6A8180FD8 (logbook_template_id), INDEX IDX_991E5CD659027487 (theme_id), PRIMARY KEY(logbook_template_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE logbook_template_theme ADD CONSTRAINT FK_991E5CD6A8180FD8 FOREIGN KEY (logbook_template_id) REFERENCES `logbook_templates` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE logbook_template_theme ADD CONSTRAINT FK_991E5CD659027487 FOREIGN KEY (theme_id) REFERENCES `themes` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE logbook_template_theme DROP FOREIGN KEY FK_991E5CD6A8180FD8');
        $this->addSql('ALTER TABLE logbook_template_theme DROP FOREIGN KEY FK_991E5CD659027487');
        $this->addSql('DROP TABLE `logbook_templates`');
        $this->addSql('DROP TABLE logbook_template_theme');
    }
}
