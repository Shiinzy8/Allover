<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200503181105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE article ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE article ADD slug VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE article ADD content TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD published_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE article DROP title');
        $this->addSql('ALTER TABLE article DROP slug');
        $this->addSql('ALTER TABLE article DROP content');
        $this->addSql('ALTER TABLE article DROP published_at');
    }
}
