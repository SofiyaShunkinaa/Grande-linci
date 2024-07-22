<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240722203813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE color CHANGE breed breed_id INT NOT NULL');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9A8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('CREATE INDEX IDX_665648E9A8B4A30F ON color (breed_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9A8B4A30F');
        $this->addSql('DROP INDEX IDX_665648E9A8B4A30F ON color');
        $this->addSql('ALTER TABLE color CHANGE breed_id breed INT NOT NULL');
    }
}
