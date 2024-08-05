<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240805205623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE breed (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cat (id INT AUTO_INCREMENT NOT NULL, breed_id INT NOT NULL, gender_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image_link LONGTEXT DEFAULT NULL, INDEX IDX_9E5E43A8A8B4A30F (breed_id), INDEX IDX_9E5E43A8708A0E0 (gender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, breed_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_665648E9A8B4A30F (breed_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon_link LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guest_request (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(50) NOT NULL, message LONGTEXT NOT NULL, request_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kitten (id INT AUTO_INCREMENT NOT NULL, breed_id INT NOT NULL, kitten_status_id INT NOT NULL, gender_id INT NOT NULL, color_id INT NOT NULL, litter_id INT NOT NULL, name VARCHAR(255) NOT NULL, image_link LONGTEXT DEFAULT NULL, INDEX IDX_42F66FFCA8B4A30F (breed_id), INDEX IDX_42F66FFC4551FA5F (kitten_status_id), INDEX IDX_42F66FFC708A0E0 (gender_id), INDEX IDX_42F66FFC7ADA1FB5 (color_id), INDEX IDX_42F66FFC128AEA69 (litter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kitten_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE litter (id INT AUTO_INCREMENT NOT NULL, breed_id INT NOT NULL, cat_mother_id INT NOT NULL, cat_father_id INT NOT NULL, name VARCHAR(255) NOT NULL, date DATE NOT NULL, is_active TINYINT(1) DEFAULT NULL, INDEX IDX_4BF2030BA8B4A30F (breed_id), INDEX IDX_4BF2030B58DD0D22 (cat_mother_id), INDEX IDX_4BF2030BCF0281CD (cat_father_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_mask (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8A8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE cat ADD CONSTRAINT FK_9E5E43A8708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE color ADD CONSTRAINT FK_665648E9A8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFCA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC4551FA5F FOREIGN KEY (kitten_status_id) REFERENCES kitten_status (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE kitten ADD CONSTRAINT FK_42F66FFC128AEA69 FOREIGN KEY (litter_id) REFERENCES litter (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030B58DD0D22 FOREIGN KEY (cat_mother_id) REFERENCES cat (id)');
        $this->addSql('ALTER TABLE litter ADD CONSTRAINT FK_4BF2030BCF0281CD FOREIGN KEY (cat_father_id) REFERENCES cat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8A8B4A30F');
        $this->addSql('ALTER TABLE cat DROP FOREIGN KEY FK_9E5E43A8708A0E0');
        $this->addSql('ALTER TABLE color DROP FOREIGN KEY FK_665648E9A8B4A30F');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFCA8B4A30F');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC4551FA5F');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC708A0E0');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC7ADA1FB5');
        $this->addSql('ALTER TABLE kitten DROP FOREIGN KEY FK_42F66FFC128AEA69');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BA8B4A30F');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030B58DD0D22');
        $this->addSql('ALTER TABLE litter DROP FOREIGN KEY FK_4BF2030BCF0281CD');
        $this->addSql('DROP TABLE breed');
        $this->addSql('DROP TABLE cat');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE guest_request');
        $this->addSql('DROP TABLE kitten');
        $this->addSql('DROP TABLE kitten_status');
        $this->addSql('DROP TABLE litter');
        $this->addSql('DROP TABLE phone_mask');
        $this->addSql('DROP TABLE user');
    }
}
