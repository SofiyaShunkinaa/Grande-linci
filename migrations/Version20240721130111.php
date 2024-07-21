<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240721130111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8A8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A8A8B4A30F ON cat (breed_id)');
        $this->addSql('CREATE INDEX IDX_9E5E43A8708A0E0 ON cat (gender_id)');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B104487C2');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B33A008CA');
        $this->addSql('DROP INDEX IDX_4BF2030B104487C2 ON litter');
        $this->addSql('DROP INDEX IDX_4BF2030B33A008CA ON litter');
        $this->addSql('ALTER TABLE litter ADD cat_mother_id INT NOT NULL, ADD cat_father_id INT NOT NULL, DROP cat_mother_id_id, DROP cat_father_id_id');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B58DD0D22 FOREIGN KEY (cat_mother_id) REFERENCES cat (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BCF0281CD FOREIGN KEY (cat_father_id) REFERENCES cat (id)');
        $this->addSql('CREATE INDEX IDX_4BF2030BA8B4A30F ON litter (breed_id)');
        $this->addSql('CREATE INDEX IDX_4BF2030B58DD0D22 ON litter (cat_mother_id)');
        $this->addSql('CREATE INDEX IDX_4BF2030BCF0281CD ON litter (cat_father_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BA8B4A30F');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B58DD0D22');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BCF0281CD');
        $this->addSql('DROP INDEX IDX_4BF2030BA8B4A30F ON litter');
        $this->addSql('DROP INDEX IDX_4BF2030B58DD0D22 ON litter');
        $this->addSql('DROP INDEX IDX_4BF2030BCF0281CD ON litter');
        $this->addSql('ALTER TABLE litter ADD cat_mother_id_id INT NOT NULL, ADD cat_father_id_id INT NOT NULL, DROP cat_mother_id, DROP cat_father_id');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B104487C2 FOREIGN KEY (cat_mother_id_id) REFERENCES cat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B33A008CA FOREIGN KEY (cat_father_id_id) REFERENCES cat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4BF2030B104487C2 ON litter (cat_mother_id_id)');
        $this->addSql('CREATE INDEX IDX_4BF2030B33A008CA ON litter (cat_father_id_id)');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8A8B4A30F');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8708A0E0');
        $this->addSql('DROP INDEX IDX_9E5E43A8A8B4A30F ON cat');
        $this->addSql('DROP INDEX IDX_9E5E43A8708A0E0 ON cat');
    }
}
