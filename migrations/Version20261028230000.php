<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261028230000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Normalisation des noms : prénom en majuscule par partie composée (Jean-Yves), nom de famille en majuscules';
    }

    public function up(Schema $schema): void
    {
        $users = $this->connection->fetchAllAssociative('SELECT id, firstname, lastname FROM users');

        foreach ($users as $user) {
            $firstname = implode('-', array_map(
                static fn (string $part): string => mb_ucfirst(mb_strtolower(trim($part))),
                explode('-', (string) $user['firstname'])
            ));
            $lastname = mb_strtoupper(trim((string) $user['lastname']));

            if ($firstname !== $user['firstname'] || $lastname !== $user['lastname']) {
                $this->addSql(
                    'UPDATE users SET firstname = :firstname, lastname = :lastname WHERE id = :id',
                    ['firstname' => $firstname, 'lastname' => $lastname, 'id' => $user['id']]
                );
            }
        }
    }

    public function down(Schema $schema): void
    {
        // Irréversible : la casse d'origine ne peut pas être restituée.
    }
}
