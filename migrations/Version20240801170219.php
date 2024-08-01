<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240801170219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE answer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE logbook_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE theme_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "users_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE answer (id INT NOT NULL, theme_id INT DEFAULT NULL, newcomer_id INT DEFAULT NULL, content TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DADD4A2559027487 ON answer (theme_id)');
        $this->addSql('CREATE INDEX IDX_DADD4A25543D6622 ON answer (newcomer_id)');
        $this->addSql('CREATE TABLE logbook (id INT NOT NULL, service_id INT DEFAULT NULL, newcomer_id INT DEFAULT NULL, mentor_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E96B9310ED5CA9E6 ON logbook (service_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E96B9310543D6622 ON logbook (newcomer_id)');
        $this->addSql('CREATE INDEX IDX_E96B9310DB403044 ON logbook (mentor_id)');
        $this->addSql('CREATE TABLE service (id INT NOT NULL, name VARCHAR(3) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE theme (id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, is_validated BOOLEAN DEFAULT NULL, remark TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE theme_logbook (theme_id INT NOT NULL, logbook_id INT NOT NULL, PRIMARY KEY(theme_id, logbook_id))');
        $this->addSql('CREATE INDEX IDX_B008963359027487 ON theme_logbook (theme_id)');
        $this->addSql('CREATE INDEX IDX_B0089633FA6B07A0 ON theme_logbook (logbook_id)');
        $this->addSql('CREATE TABLE "users" (id INT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, roles TEXT NOT NULL, password VARCHAR(255) NOT NULL, last_login_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "users" (email)');
        $this->addSql('COMMENT ON COLUMN "users".roles IS \'(DC2Type:simple_array)\'');
        $this->addSql('COMMENT ON COLUMN "users".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A2559027487 FOREIGN KEY (theme_id) REFERENCES theme (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25543D6622 FOREIGN KEY (newcomer_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE logbook ADD CONSTRAINT FK_E96B9310ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE logbook ADD CONSTRAINT FK_E96B9310543D6622 FOREIGN KEY (newcomer_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE logbook ADD CONSTRAINT FK_E96B9310DB403044 FOREIGN KEY (mentor_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B008963359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B0089633FA6B07A0 FOREIGN KEY (logbook_id) REFERENCES logbook (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE answer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE logbook_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theme_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "users_id_seq" CASCADE');
        $this->addSql('ALTER TABLE answer DROP CONSTRAINT FK_DADD4A2559027487');
        $this->addSql('ALTER TABLE answer DROP CONSTRAINT FK_DADD4A25543D6622');
        $this->addSql('ALTER TABLE logbook DROP CONSTRAINT FK_E96B9310ED5CA9E6');
        $this->addSql('ALTER TABLE logbook DROP CONSTRAINT FK_E96B9310543D6622');
        $this->addSql('ALTER TABLE logbook DROP CONSTRAINT FK_E96B9310DB403044');
        $this->addSql('ALTER TABLE theme_logbook DROP CONSTRAINT FK_B008963359027487');
        $this->addSql('ALTER TABLE theme_logbook DROP CONSTRAINT FK_B0089633FA6B07A0');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE logbook');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE theme_logbook');
        $this->addSql('DROP TABLE "users"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
