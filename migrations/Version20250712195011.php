<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250712195011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `actions` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', module_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', logbook_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', description VARCHAR(255) DEFAULT NULL, agent_comment LONGTEXT DEFAULT NULL, agent_validated_at DATETIME DEFAULT NULL, agent_visa VARCHAR(255) DEFAULT NULL, mentor_comment LONGTEXT DEFAULT NULL, mentor_validated_at DATETIME DEFAULT NULL, mentor_commented_at DATETIME DEFAULT NULL, mentor_visa VARCHAR(255) DEFAULT NULL, INDEX IDX_548F1EFAFC2B591 (module_id), INDEX IDX_548F1EFA76ED395 (user_id), INDEX IDX_548F1EFFA6B07A0 (logbook_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `feedbacks` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', author_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', reviewed_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(150) NOT NULL, content LONGTEXT NOT NULL, category VARCHAR(50) NOT NULL, is_reviewed TINYINT(1) DEFAULT NULL, manager_comment LONGTEXT DEFAULT NULL, review_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, INDEX IDX_7E6C3F89F675F31B (author_id), INDEX IDX_7E6C3F89FC6B21F1 (reviewed_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `logbooks` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', owner_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) DEFAULT NULL, INDEX IDX_650B4FC7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `modules` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', theme_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(100) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_2EB743D759027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', chef_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(10) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_E19D9AD2150A48F1 (chef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `themes` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme_logbook (theme_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', logbook_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_B008963359027487 (theme_id), INDEX IDX_B0089633FA6B07A0 (logbook_id), PRIMARY KEY(theme_id, logbook_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `users` (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', mentor_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', service_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', password VARCHAR(255) NOT NULL, last_login_at DATETIME DEFAULT NULL, job VARCHAR(80) DEFAULT NULL, nni VARCHAR(6) DEFAULT NULL, speciality VARCHAR(80) DEFAULT NULL, hiring_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, INDEX IDX_1483A5E9DB403044 (mentor_id), INDEX IDX_1483A5E9ED5CA9E6 (service_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `actions` ADD CONSTRAINT FK_548F1EFAFC2B591 FOREIGN KEY (module_id) REFERENCES `modules` (id)');
        $this->addSql('ALTER TABLE `actions` ADD CONSTRAINT FK_548F1EFA76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `actions` ADD CONSTRAINT FK_548F1EFFA6B07A0 FOREIGN KEY (logbook_id) REFERENCES `logbooks` (id)');
        $this->addSql('ALTER TABLE `feedbacks` ADD CONSTRAINT FK_7E6C3F89F675F31B FOREIGN KEY (author_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `feedbacks` ADD CONSTRAINT FK_7E6C3F89FC6B21F1 FOREIGN KEY (reviewed_by_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE `logbooks` ADD CONSTRAINT FK_650B4FC7E3C61F9 FOREIGN KEY (owner_id) REFERENCES `users` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `modules` ADD CONSTRAINT FK_2EB743D759027487 FOREIGN KEY (theme_id) REFERENCES `themes` (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2150A48F1 FOREIGN KEY (chef_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B008963359027487 FOREIGN KEY (theme_id) REFERENCES `themes` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B0089633FA6B07A0 FOREIGN KEY (logbook_id) REFERENCES `logbooks` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `users` ADD CONSTRAINT FK_1483A5E9DB403044 FOREIGN KEY (mentor_id) REFERENCES `users` (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE `users` ADD CONSTRAINT FK_1483A5E9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `actions` DROP FOREIGN KEY FK_548F1EFAFC2B591');
        $this->addSql('ALTER TABLE `actions` DROP FOREIGN KEY FK_548F1EFA76ED395');
        $this->addSql('ALTER TABLE `actions` DROP FOREIGN KEY FK_548F1EFFA6B07A0');
        $this->addSql('ALTER TABLE `feedbacks` DROP FOREIGN KEY FK_7E6C3F89F675F31B');
        $this->addSql('ALTER TABLE `feedbacks` DROP FOREIGN KEY FK_7E6C3F89FC6B21F1');
        $this->addSql('ALTER TABLE `logbooks` DROP FOREIGN KEY FK_650B4FC7E3C61F9');
        $this->addSql('ALTER TABLE `modules` DROP FOREIGN KEY FK_2EB743D759027487');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2150A48F1');
        $this->addSql('ALTER TABLE theme_logbook DROP FOREIGN KEY FK_B008963359027487');
        $this->addSql('ALTER TABLE theme_logbook DROP FOREIGN KEY FK_B0089633FA6B07A0');
        $this->addSql('ALTER TABLE `users` DROP FOREIGN KEY FK_1483A5E9DB403044');
        $this->addSql('ALTER TABLE `users` DROP FOREIGN KEY FK_1483A5E9ED5CA9E6');
        $this->addSql('DROP TABLE `actions`');
        $this->addSql('DROP TABLE `feedbacks`');
        $this->addSql('DROP TABLE `logbooks`');
        $this->addSql('DROP TABLE `modules`');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE `themes`');
        $this->addSql('DROP TABLE theme_logbook');
        $this->addSql('DROP TABLE `users`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
