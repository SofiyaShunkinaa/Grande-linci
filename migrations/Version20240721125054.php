<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240721125054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE kitten_status');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC243B1A1A');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC6F7F214C');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFCE88CCE5');
        $this->addSql('DROP INDEX IDX_42F66FFC243B1A1A ON kitten');
        $this->addSql('DROP INDEX IDX_42F66FFC6F7F214C ON kitten');
        $this->addSql('DROP INDEX IDX_42F66FFCE88CCE5 ON kitten');
        $this->addSql('ALTER TABLE kitten ADD breed_id INT NOT NULL, ADD gender_id INT NOT NULL, ADD сolor_id INT NOT NULL, DROP breed_id_id, DROP gender_id_id, DROP color_id_id');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFCA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC3B78A314 FOREIGN KEY (сolor_id) REFERENCES color (id)');
        $this->addSql('CREATE INDEX IDX_42F66FFCA8B4A30F ON kitten (breed_id)');
        $this->addSql('CREATE INDEX IDX_42F66FFC708A0E0 ON kitten (gender_id)');
        $this->addSql('CREATE INDEX IDX_42F66FFC3B78A314 ON kitten (сolor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kitten_status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFCA8B4A30F');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC708A0E0');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC3B78A314');
        $this->addSql('DROP INDEX IDX_42F66FFCA8B4A30F ON kitten');
        $this->addSql('DROP INDEX IDX_42F66FFC708A0E0 ON kitten');
        $this->addSql('DROP INDEX IDX_42F66FFC3B78A314 ON kitten');
        $this->addSql('ALTER TABLE kitten ADD breed_id_id INT NOT NULL, ADD gender_id_id INT NOT NULL, ADD color_id_id INT NOT NULL, DROP breed_id, DROP gender_id, DROP сolor_id');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC243B1A1A FOREIGN KEY (breed_id_id) REFERENCES breed (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC6F7F214C FOREIGN KEY (gender_id_id) REFERENCES gender (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFCE88CCE5 FOREIGN KEY (color_id_id) REFERENCES color (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_42F66FFC243B1A1A ON kitten (breed_id_id)');
        $this->addSql('CREATE INDEX IDX_42F66FFC6F7F214C ON kitten (gender_id_id)');
        $this->addSql('CREATE INDEX IDX_42F66FFCE88CCE5 ON kitten (color_id_id)');
    }
}
