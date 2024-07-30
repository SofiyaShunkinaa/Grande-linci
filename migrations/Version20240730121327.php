<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240730121327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitten ADD litter_id INT NOT NULL, ADD image_link LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC128AEA69 FOREIGN KEY (litter_id) REFERENCES litter (id)');
        $this->addSql('CREATE INDEX IDX_42F66FFC128AEA69 ON kitten (litter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC128AEA69');
        $this->addSql('DROP INDEX IDX_42F66FFC128AEA69 ON kitten');
        $this->addSql('ALTER TABLE kitten DROP litter_id, DROP image_link');
    }
}
