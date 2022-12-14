<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214134622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_project_todo ADD users_id UUID DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN user_project_todo.users_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE user_project_todo ADD CONSTRAINT FK_E35302BA67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E35302BA67B3B43D ON user_project_todo (users_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_project_todo DROP CONSTRAINT FK_E35302BA67B3B43D');
        $this->addSql('DROP INDEX IDX_E35302BA67B3B43D');
        $this->addSql('ALTER TABLE user_project_todo DROP users_id');
    }
}
