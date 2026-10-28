<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261028185620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campagne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, groupement_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_539B5D16E66695CE (groupement_id), INDEX IDX_539B5D16C54C8C93 (type_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, campagne_id INT NOT NULL, membre_id INT NOT NULL, INDEX IDX_3C914DFD16227374 (campagne_id), INDEX IDX_3C914DFD6A99F74A (membre_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE exercice (id INT AUTO_INCREMENT NOT NULL, date_debut DATETIME NOT NULL, date_limite_pret DATETIME NOT NULL, date_retribution DATETIME NOT NULL, statut VARCHAR(255) NOT NULL, groupement_id INT NOT NULL, INDEX IDX_E418C74DE66695CE (groupement_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE groupement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, addresse VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, addresse VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role_id INT DEFAULT NULL, groupement_id INT DEFAULT NULL, INDEX IDX_F6B4FB29D60322AC (role_id), INDEX IDX_F6B4FB29E66695CE (groupement_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16E66695CE FOREIGN KEY (groupement_id) REFERENCES groupement (id)');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFD16227374 FOREIGN KEY (campagne_id) REFERENCES campagne (id)');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFD6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DE66695CE FOREIGN KEY (groupement_id) REFERENCES groupement (id)');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29E66695CE FOREIGN KEY (groupement_id) REFERENCES groupement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16E66695CE');
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16C54C8C93');
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFD16227374');
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFD6A99F74A');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DE66695CE');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29D60322AC');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29E66695CE');
        $this->addSql('DROP TABLE campagne');
        $this->addSql('DROP TABLE contenir');
        $this->addSql('DROP TABLE exercice');
        $this->addSql('DROP TABLE groupement');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
