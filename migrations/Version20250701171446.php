<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250701171446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE service (id BINARY(16) NOT NULL COMMENT '(DC2Type:uuid)', chef_id BINARY(16) DEFAULT NULL COMMENT '(DC2Type:uuid)', name VARCHAR(10) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_E19D9AD2150A48F1 (chef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2150A48F1 FOREIGN KEY (chef_id) REFERENCES `users` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD service_id BINARY(16) DEFAULT NULL COMMENT '(DC2Type:uuid)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD CONSTRAINT FK_1483A5E9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1483A5E9ED5CA9E6 ON users (service_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE `users` DROP FOREIGN KEY FK_1483A5E9ED5CA9E6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2150A48F1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE service
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_1483A5E9ED5CA9E6 ON `users`
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `users` DROP service_id
        SQL);
    }
}
