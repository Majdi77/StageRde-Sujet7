<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230714100804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, demandes_id INT DEFAULT NULL, users_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, cv VARCHAR(255) NOT NULL, lettre_motivation VARCHAR(255) NOT NULL, INDEX IDX_2694D7A5F49DCC2D (demandes_id), INDEX IDX_2694D7A567B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, competence VARCHAR(255) NOT NULL, niveau_etude VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, cible VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_5A8A6C8DA4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5F49DCC2D FOREIGN KEY (demandes_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A567B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE user ADD entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A4AEAFEA ON user (entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A4AEAFEA');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5F49DCC2D');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A567B3B43D');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA4AEAFEA');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP INDEX IDX_8D93D649A4AEAFEA ON user');
        $this->addSql('ALTER TABLE user DROP entreprise_id');
    }
}
