<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214111545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_project_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_project_todo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('CREATE TABLE user_project (id UUID NOT NULL, users_id UUID DEFAULT NULL, views INT NOT NULL, title TEXT NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_77BECEE467B3B43D ON user_project (users_id)');
        $this->addSql('COMMENT ON COLUMN user_project.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN user_project.users_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE user_project_todo (uuid UUID NOT NULL, user_project_id UUID DEFAULT NULL, title TEXT NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('CREATE INDEX IDX_E35302BAB10AD970 ON user_project_todo (user_project_id)');
        $this->addSql('COMMENT ON COLUMN user_project_todo.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN user_project_todo.user_project_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE users (id UUID NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN users.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE user_project ADD CONSTRAINT FK_77BECEE467B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_project_todo ADD CONSTRAINT FK_E35302BAB10AD970 FOREIGN KEY (user_project_id) REFERENCES user_project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_project_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_project_todo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE user_project DROP CONSTRAINT FK_77BECEE467B3B43D');
        $this->addSql('ALTER TABLE user_project_todo DROP CONSTRAINT FK_E35302BAB10AD970');
        $this->addSql('DROP TABLE user_project');
        $this->addSql('DROP TABLE user_project_todo');
        $this->addSql('DROP TABLE users');
    }
}
