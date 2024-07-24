<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240724145759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC4551FA5F FOREIGN KEY (kitten_status_id) REFERENCES kitten_status (id)');
        $this->addSql('CREATE INDEX IDX_42F66FFC4551FA5F ON kitten (kitten_status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC4551FA5F');
        $this->addSql('DROP INDEX IDX_42F66FFC4551FA5F ON kitten');
    }
}
