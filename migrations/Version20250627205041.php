<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250627205041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE `feedbacks` (id INT AUTO_INCREMENT NOT NULL, author_id BINARY(16) NOT NULL COMMENT '(DC2Type:uuid)', reviewed_by_id BINARY(16) DEFAULT NULL COMMENT '(DC2Type:uuid)', title VARCHAR(150) NOT NULL, content LONGTEXT NOT NULL, category VARCHAR(50) NOT NULL, is_reviewed TINYINT(1) DEFAULT NULL, manager_comment LONGTEXT DEFAULT NULL, review_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL, INDEX IDX_7E6C3F89F675F31B (author_id), INDEX IDX_7E6C3F89FC6B21F1 (reviewed_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `feedbacks` ADD CONSTRAINT FK_7E6C3F89F675F31B FOREIGN KEY (author_id) REFERENCES `users` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `feedbacks` ADD CONSTRAINT FK_7E6C3F89FC6B21F1 FOREIGN KEY (reviewed_by_id) REFERENCES `users` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458F675F31B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458FC6B21F1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE feedback
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE feedback (id INT AUTO_INCREMENT NOT NULL, author_id BINARY(16) NOT NULL COMMENT '(DC2Type:uuid)', reviewed_by_id BINARY(16) DEFAULT NULL COMMENT '(DC2Type:uuid)', title VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_reviewed TINYINT(1) DEFAULT NULL, manager_comment LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, review_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_D2294458F675F31B (author_id), INDEX IDX_D2294458FC6B21F1 (reviewed_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE feedback ADD CONSTRAINT FK_D2294458F675F31B FOREIGN KEY (author_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE feedback ADD CONSTRAINT FK_D2294458FC6B21F1 FOREIGN KEY (reviewed_by_id) REFERENCES users (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `feedbacks` DROP FOREIGN KEY FK_7E6C3F89F675F31B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `feedbacks` DROP FOREIGN KEY FK_7E6C3F89FC6B21F1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE `feedbacks`
        SQL);
    }
}
