<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261122130344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute warning_sent_at sur logbook_archives (idempotence de l\'avertissement J-30 avant purge)';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE logbook_archives ADD warning_sent_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE logbook_archives DROP warning_sent_at');
    }
}
