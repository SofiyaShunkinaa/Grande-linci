<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240720205701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, breed_id INT NOT NULL, gender_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kitten (id INT AUTO_INCREMENT NOT NULL, breed_id_id INT NOT NULL, gender_id_id INT NOT NULL, color_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, kitten_status VARCHAR(255) NOT NULL, INDEX IDX_42F66FFC243B1A1A (breed_id_id), INDEX IDX_42F66FFC6F7F214C (gender_id_id), INDEX IDX_42F66FFCE88CCE5 (color_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kitten_status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE litter (id INT AUTO_INCREMENT NOT NULL, cat_mother_id_id INT NOT NULL, cat_father_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, date DATE NOT NULL, breed_id INT NOT NULL, INDEX IDX_4BF2030B104487C2 (cat_mother_id_id), INDEX IDX_4BF2030B33A008CA (cat_father_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC243B1A1A FOREIGN KEY (breed_id_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC6F7F214C FOREIGN KEY (gender_id_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFCE88CCE5 FOREIGN KEY (color_id_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B104487C2 FOREIGN KEY (cat_mother_id_id) REFERENCES cat (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B33A008CA FOREIGN KEY (cat_father_id_id) REFERENCES cat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC243B1A1A');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC6F7F214C');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFCE88CCE5');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B104487C2');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B33A008CA');
        $this->addSql('DROP TABLE cat');
        $this->addSql('DROP TABLE kitten');
        $this->addSql('DROP TABLE kitten_status');
        $this->addSql('DROP TABLE litter');
    }
}
