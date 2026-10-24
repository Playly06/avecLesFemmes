<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261024181359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campagne (nom VARCHAR(255) NOT NULL, id INT AUTO_INCREMENT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, groupement_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_539B5D16E66695CE (groupement_id), INDEX IDX_539B5D16C54C8C93 (type_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE contenir_campagne (contenir_id INT NOT NULL, campagne_id INT NOT NULL, INDEX IDX_927D51D91982B715 (contenir_id), INDEX IDX_927D51D916227374 (campagne_id), PRIMARY KEY (contenir_id, campagne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE contenir_membre (contenir_id INT NOT NULL, membre_id INT NOT NULL, INDEX IDX_EF7317B81982B715 (contenir_id), INDEX IDX_EF7317B86A99F74A (membre_id), PRIMARY KEY (contenir_id, membre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE groupement (nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, addresse VARCHAR(255) NOT NULL, id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE membre (nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, addresse VARCHAR(255) NOT NULL, id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, groupement_id INT NOT NULL, role_id INT NOT NULL, INDEX IDX_F6B4FB29E66695CE (groupement_id), INDEX IDX_F6B4FB29D60322AC (role_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE role (nom VARCHAR(255) NOT NULL, id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE type (nom VARCHAR(255) NOT NULL, id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16E66695CE FOREIGN KEY (groupement_id) REFERENCES groupement (id)');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT FK_539B5D16C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE contenir_campagne ADD CONSTRAINT FK_927D51D91982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_campagne ADD CONSTRAINT FK_927D51D916227374 FOREIGN KEY (campagne_id) REFERENCES campagne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_membre ADD CONSTRAINT FK_EF7317B81982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_membre ADD CONSTRAINT FK_EF7317B86A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29E66695CE FOREIGN KEY (groupement_id) REFERENCES groupement (id)');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16E66695CE');
        $this->addSql('ALTER TABLE campagne DROP FOREIGN KEY FK_539B5D16C54C8C93');
        $this->addSql('ALTER TABLE contenir_campagne DROP FOREIGN KEY FK_927D51D91982B715');
        $this->addSql('ALTER TABLE contenir_campagne DROP FOREIGN KEY FK_927D51D916227374');
        $this->addSql('ALTER TABLE contenir_membre DROP FOREIGN KEY FK_EF7317B81982B715');
        $this->addSql('ALTER TABLE contenir_membre DROP FOREIGN KEY FK_EF7317B86A99F74A');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29E66695CE');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29D60322AC');
        $this->addSql('DROP TABLE campagne');
        $this->addSql('DROP TABLE contenir');
        $this->addSql('DROP TABLE contenir_campagne');
        $this->addSql('DROP TABLE contenir_membre');
        $this->addSql('DROP TABLE groupement');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
