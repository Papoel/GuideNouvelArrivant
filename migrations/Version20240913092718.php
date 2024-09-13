<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240913092718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, module_id INT DEFAULT NULL, user_id INT NOT NULL, description VARCHAR(255) DEFAULT NULL, agent_comment LONGTEXT DEFAULT NULL, agent_validated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', agent_visa VARCHAR(255) DEFAULT NULL, mentor_comment LONGTEXT DEFAULT NULL, mentor_validated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', mentor_visa VARCHAR(255) DEFAULT NULL, INDEX IDX_47CC8C92AFC2B591 (module_id), INDEX IDX_47CC8C92A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logbook (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_E96B93107E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, theme_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_C24262859027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme_logbook (theme_id INT NOT NULL, logbook_id INT NOT NULL, INDEX IDX_B008963359027487 (theme_id), INDEX IDX_B0089633FA6B07A0 (logbook_id), PRIMARY KEY(theme_id, logbook_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `users` (id INT AUTO_INCREMENT NOT NULL, mentor_id INT DEFAULT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', password VARCHAR(255) NOT NULL, last_login_at DATETIME DEFAULT NULL, job VARCHAR(80) DEFAULT NULL, nni VARCHAR(6) DEFAULT NULL, speciality VARCHAR(80) DEFAULT NULL, hiring_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL, INDEX IDX_1483A5E9DB403044 (mentor_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92A76ED395 FOREIGN KEY (user_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE logbook ADD CONSTRAINT FK_E96B93107E3C61F9 FOREIGN KEY (owner_id) REFERENCES `users` (id)');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C24262859027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B008963359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B0089633FA6B07A0 FOREIGN KEY (logbook_id) REFERENCES logbook (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `users` ADD CONSTRAINT FK_1483A5E9DB403044 FOREIGN KEY (mentor_id) REFERENCES `users` (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92AFC2B591');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92A76ED395');
        $this->addSql('ALTER TABLE logbook DROP FOREIGN KEY FK_E96B93107E3C61F9');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C24262859027487');
        $this->addSql('ALTER TABLE theme_logbook DROP FOREIGN KEY FK_B008963359027487');
        $this->addSql('ALTER TABLE theme_logbook DROP FOREIGN KEY FK_B0089633FA6B07A0');
        $this->addSql('ALTER TABLE `users` DROP FOREIGN KEY FK_1483A5E9DB403044');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE logbook');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE theme_logbook');
        $this->addSql('DROP TABLE `users`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
