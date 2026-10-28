<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261028090000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Accès & audit : fusion des rôles supprimés (users.roles CSV), création de la table audit_log, suppression du vestige admin_audit_log';
    }

    public function up(Schema $schema): void
    {
        // 1. Fusion des rôles supprimés (colonne users.roles en CSV)
        //    SERVICE_HEAD_DELEGATE→SERVICE_HEAD, MANAGER_DELEGATE→MANAGER, NEWCOMER→USER
        $this->addSql(<<<'SQL'
            UPDATE users
            SET roles = REPLACE(roles, 'ROLE_SERVICE_HEAD_DELEGATE', 'ROLE_SERVICE_HEAD')
            WHERE FIND_IN_SET('ROLE_SERVICE_HEAD_DELEGATE', roles)
              AND NOT FIND_IN_SET('ROLE_SERVICE_HEAD', roles)
        SQL);

        $this->addSql(<<<'SQL'
            UPDATE users
            SET roles = TRIM(BOTH ',' FROM REPLACE(CONCAT(',', roles, ','), ',ROLE_SERVICE_HEAD_DELEGATE,', ','))
            WHERE FIND_IN_SET('ROLE_SERVICE_HEAD_DELEGATE', roles)
        SQL);

        $this->addSql(<<<'SQL'
            UPDATE users
            SET roles = REPLACE(roles, 'ROLE_MANAGER_DELEGATE', 'ROLE_MANAGER')
            WHERE FIND_IN_SET('ROLE_MANAGER_DELEGATE', roles)
              AND NOT FIND_IN_SET('ROLE_MANAGER', roles)
        SQL);

        $this->addSql(<<<'SQL'
            UPDATE users
            SET roles = TRIM(BOTH ',' FROM REPLACE(CONCAT(',', roles, ','), ',ROLE_MANAGER_DELEGATE,', ','))
            WHERE FIND_IN_SET('ROLE_MANAGER_DELEGATE', roles)
        SQL);

        // NEWCOMER : suppression simple — ROLE_USER est garanti par User::getRoles()
        $this->addSql(<<<'SQL'
            UPDATE users
            SET roles = TRIM(BOTH ',' FROM REPLACE(CONCAT(',', roles, ','), ',ROLE_NEWCOMER,', ','))
            WHERE FIND_IN_SET('ROLE_NEWCOMER', roles)
        SQL);

        // 2. Journal d'audit (inclut entity_label dès la création)
        $this->addSql('CREATE TABLE audit_log (id INT AUTO_INCREMENT NOT NULL, occurred_at DATETIME NOT NULL, action VARCHAR(20) NOT NULL, entity_class VARCHAR(255) NOT NULL, entity_id VARCHAR(64) DEFAULT NULL, entity_label VARCHAR(255) DEFAULT NULL, changeset JSON DEFAULT NULL, actor_type VARCHAR(20) NOT NULL, actor_id VARCHAR(64) DEFAULT NULL, actor_label VARCHAR(255) DEFAULT NULL, context JSON DEFAULT NULL, INDEX idx_audit_entity (entity_class, entity_id), INDEX idx_audit_occurred_at (occurred_at), INDEX idx_audit_actor (actor_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');

        // 3. Suppression du vestige admin_audit_log (auditor-bundle), portable tous envs
        $this->addSql('DROP TABLE IF EXISTS admin_audit_log');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE TABLE admin_audit_log (id BINARY(16) NOT NULL, actor_identifier VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, action VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, subject_class VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_uca1400_ai_ci`, subject_id VARCHAR(36) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_uca1400_ai_ci`, subject_label VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_uca1400_ai_ci`, changes JSON DEFAULT NULL, summary LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_uca1400_ai_ci`, ip_address VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_uca1400_ai_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, updated_at DATETIME DEFAULT NULL, INDEX idx_audit_actor (actor_identifier), INDEX idx_audit_subject_class (subject_class), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_uca1400_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE audit_log');
        // Rôles : irréversible — impossible de distinguer les utilisateurs
        // migrés de ceux qui détenaient légitimement le rôle cible.
    }
}
