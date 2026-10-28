<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261028090000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Fusion des rôles supprimés (colonne users.roles en CSV) : SERVICE_HEAD_DELEGATE→SERVICE_HEAD, MANAGER_DELEGATE→MANAGER, NEWCOMER→USER';
    }

    public function up(Schema $schema): void
    {
        // Remplacer le rôle délégué quand le rôle cible n'est pas déjà présent
        $this->addSql(<<<'SQL'
            UPDATE users
            SET roles = REPLACE(roles, 'ROLE_SERVICE_HEAD_DELEGATE', 'ROLE_SERVICE_HEAD')
            WHERE FIND_IN_SET('ROLE_SERVICE_HEAD_DELEGATE', roles)
              AND NOT FIND_IN_SET('ROLE_SERVICE_HEAD', roles)
        SQL);

        // Retirer le rôle délégué quand le rôle cible existe déjà (évite les doublons)
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
    }

    public function down(Schema $schema): void
    {
        // Irréversible : après fusion il est impossible de distinguer les
        // utilisateurs migrés de ceux qui détenaient légitimement le rôle cible.
    }
}
