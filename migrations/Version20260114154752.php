<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260114154752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, preu DOUBLE PRECISION NOT NULL, stock INT NOT NULL, imatge VARCHAR(255) NOT NULL, seccio_id INT DEFAULT NULL, INDEX IDX_23A0E66ED7580A6 (seccio_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE seccio (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, descripcio VARCHAR(255) NOT NULL, any INT NOT NULL, imatge VARCHAR(100) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66ED7580A6 FOREIGN KEY (seccio_id) REFERENCES seccio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66ED7580A6');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE seccio');
    }
}
