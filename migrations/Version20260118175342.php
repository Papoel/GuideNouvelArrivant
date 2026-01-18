<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260118175342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE deletion_request (id INT AUTO_INCREMENT NOT NULL, user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', requested_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', scheduled_deletion_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(20) NOT NULL, cancelled_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', processed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', cancellation_token VARCHAR(64) NOT NULL, user_info VARCHAR(255) DEFAULT NULL, INDEX IDX_57E3A002A76ED395 (user_id), INDEX IDX_57E3A0024DA1E751 (requested_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deletion_request ADD CONSTRAINT FK_57E3A002A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE deletion_request ADD CONSTRAINT FK_57E3A0024DA1E751 FOREIGN KEY (requested_by_id) REFERENCES `users` (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE deletion_request DROP FOREIGN KEY FK_57E3A002A76ED395');
        $this->addSql('ALTER TABLE deletion_request DROP FOREIGN KEY FK_57E3A0024DA1E751');
        $this->addSql('DROP TABLE deletion_request');
    }
}
