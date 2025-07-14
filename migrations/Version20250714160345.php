<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250714160345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE logbook_templates ADD service_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE logbook_templates ADD CONSTRAINT FK_EDBB7CA9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_EDBB7CA9ED5CA9E6 ON logbook_templates (service_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `logbook_templates` DROP FOREIGN KEY FK_EDBB7CA9ED5CA9E6');
        $this->addSql('DROP INDEX IDX_EDBB7CA9ED5CA9E6 ON `logbook_templates`');
        $this->addSql('ALTER TABLE `logbook_templates` DROP service_id');
    }
}
