<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240825215320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE action_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE logbook_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE module_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE theme_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "users_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE action (id INT NOT NULL, module_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, agent_comment TEXT DEFAULT NULL, agent_validated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, agent_visa VARCHAR(255) DEFAULT NULL, mentor_comment TEXT DEFAULT NULL, mentor_validated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, mentor_visa VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_47CC8C92AFC2B591 ON action (module_id)');
        $this->addSql('COMMENT ON COLUMN action.agent_validated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN action.mentor_validated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE logbook (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE module (id INT NOT NULL, theme_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C24262859027487 ON module (theme_id)');
        $this->addSql('CREATE TABLE theme (id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE theme_logbook (theme_id INT NOT NULL, logbook_id INT NOT NULL, PRIMARY KEY(theme_id, logbook_id))');
        $this->addSql('CREATE INDEX IDX_B008963359027487 ON theme_logbook (theme_id)');
        $this->addSql('CREATE INDEX IDX_B0089633FA6B07A0 ON theme_logbook (logbook_id)');
        $this->addSql('CREATE TABLE "users" (id INT NOT NULL, mentor_id INT DEFAULT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, roles TEXT NOT NULL, password VARCHAR(255) NOT NULL, last_login_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, job VARCHAR(80) DEFAULT NULL, nni VARCHAR(6) DEFAULT NULL, speciality VARCHAR(80) DEFAULT NULL, hiring_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1483A5E9DB403044 ON "users" (mentor_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "users" (email)');
        $this->addSql('COMMENT ON COLUMN "users".roles IS \'(DC2Type:simple_array)\'');
        $this->addSql('COMMENT ON COLUMN "users".hiring_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "users".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE user_logbook (user_id INT NOT NULL, logbook_id INT NOT NULL, PRIMARY KEY(user_id, logbook_id))');
        $this->addSql('CREATE INDEX IDX_B1668D1AA76ED395 ON user_logbook (user_id)');
        $this->addSql('CREATE INDEX IDX_B1668D1AFA6B07A0 ON user_logbook (logbook_id)');
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
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C24262859027487 FOREIGN KEY (theme_id) REFERENCES theme (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B008963359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE theme_logbook ADD CONSTRAINT FK_B0089633FA6B07A0 FOREIGN KEY (logbook_id) REFERENCES logbook (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "users" ADD CONSTRAINT FK_1483A5E9DB403044 FOREIGN KEY (mentor_id) REFERENCES "users" (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_logbook ADD CONSTRAINT FK_B1668D1AA76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_logbook ADD CONSTRAINT FK_B1668D1AFA6B07A0 FOREIGN KEY (logbook_id) REFERENCES logbook (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE action_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE logbook_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE module_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE theme_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "users_id_seq" CASCADE');
        $this->addSql('ALTER TABLE action DROP CONSTRAINT FK_47CC8C92AFC2B591');
        $this->addSql('ALTER TABLE module DROP CONSTRAINT FK_C24262859027487');
        $this->addSql('ALTER TABLE theme_logbook DROP CONSTRAINT FK_B008963359027487');
        $this->addSql('ALTER TABLE theme_logbook DROP CONSTRAINT FK_B0089633FA6B07A0');
        $this->addSql('ALTER TABLE "users" DROP CONSTRAINT FK_1483A5E9DB403044');
        $this->addSql('ALTER TABLE user_logbook DROP CONSTRAINT FK_B1668D1AA76ED395');
        $this->addSql('ALTER TABLE user_logbook DROP CONSTRAINT FK_B1668D1AFA6B07A0');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE logbook');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE theme_logbook');
        $this->addSql('DROP TABLE "users"');
        $this->addSql('DROP TABLE user_logbook');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
