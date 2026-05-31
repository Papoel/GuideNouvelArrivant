<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260531091219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actions CHANGE id id BINARY(16) NOT NULL, CHANGE module_id module_id BINARY(16) DEFAULT NULL, CHANGE user_id user_id BINARY(16) NOT NULL, CHANGE logbook_id logbook_id BINARY(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE backup CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE deletion_request CHANGE user_id user_id BINARY(16) NOT NULL, CHANGE requested_by_id requested_by_id BINARY(16) DEFAULT NULL, CHANGE requested_at requested_at DATETIME NOT NULL, CHANGE scheduled_deletion_at scheduled_deletion_at DATETIME NOT NULL, CHANGE cancelled_at cancelled_at DATETIME DEFAULT NULL, CHANGE processed_at processed_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE feedbacks CHANGE id id BINARY(16) NOT NULL, CHANGE author_id author_id BINARY(16) NOT NULL, CHANGE reviewed_by_id reviewed_by_id BINARY(16) DEFAULT NULL, CHANGE review_at review_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE logbook_templates CHANGE id id BINARY(16) NOT NULL, CHANGE service_id service_id BINARY(16) DEFAULT NULL, CHANGE jobs jobs JSON NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE logbook_template_theme CHANGE logbook_template_id logbook_template_id BINARY(16) NOT NULL, CHANGE theme_id theme_id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE logbooks CHANGE id id BINARY(16) NOT NULL, CHANGE owner_id owner_id BINARY(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE modules CHANGE id id BINARY(16) NOT NULL, CHANGE theme_id theme_id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE reset_password_request CHANGE user_id user_id BINARY(16) NOT NULL, CHANGE requested_at requested_at DATETIME NOT NULL, CHANGE expires_at expires_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE services CHANGE id id BINARY(16) NOT NULL, CHANGE chef_id chef_id BINARY(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE themes CHANGE id id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE theme_logbook CHANGE theme_id theme_id BINARY(16) NOT NULL, CHANGE logbook_id logbook_id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE id id BINARY(16) NOT NULL, CHANGE mentor_id mentor_id BINARY(16) DEFAULT NULL, CHANGE service_id service_id BINARY(16) DEFAULT NULL, CHANGE roles roles LONGTEXT NOT NULL, CHANGE hiring_at hiring_at DATETIME DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `actions` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE module_id module_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE user_id user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE logbook_id logbook_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE backup CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE deletion_request CHANGE requested_at requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE scheduled_deletion_at scheduled_deletion_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE cancelled_at cancelled_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE processed_at processed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE user_id user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE requested_by_id requested_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE `feedbacks` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE review_at review_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', CHANGE author_id author_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE reviewed_by_id reviewed_by_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE `logbooks` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE owner_id owner_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE `logbook_templates` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE jobs jobs JSON NOT NULL COMMENT \'(DC2Type:json)\', CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', CHANGE service_id service_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE logbook_template_theme CHANGE logbook_template_id logbook_template_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE theme_id theme_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE `modules` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE theme_id theme_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE reset_password_request CHANGE requested_at requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE expires_at expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE user_id user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE `services` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE chef_id chef_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE `themes` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE theme_logbook CHANGE theme_id theme_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE logbook_id logbook_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE `users` CHANGE id id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', CHANGE hiring_at hiring_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT \'(DC2Type:datetime_immutable)\', CHANGE mentor_id mentor_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE service_id service_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
    }
}
