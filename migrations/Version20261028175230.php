<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261028175230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audit_log (id INT AUTO_INCREMENT NOT NULL, occurred_at DATETIME NOT NULL, action VARCHAR(20) NOT NULL, entity_class VARCHAR(255) NOT NULL, entity_id VARCHAR(64) DEFAULT NULL, changeset JSON DEFAULT NULL, actor_type VARCHAR(20) NOT NULL, actor_id VARCHAR(64) DEFAULT NULL, actor_label VARCHAR(255) DEFAULT NULL, context JSON DEFAULT NULL, INDEX idx_audit_entity (entity_class, entity_id), INDEX idx_audit_occurred_at (occurred_at), INDEX idx_audit_actor (actor_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        // NOTE : la table legacy admin_audit_log (4 lignes, vestige auditor-bundle)
        // est conservée volontairement — à supprimer manuellement après inspection.
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE audit_log');
    }
}
