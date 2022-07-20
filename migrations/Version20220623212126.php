<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623212126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, titulaire VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, numero INT NOT NULL, expiration DATE NOT NULL, cryptogramme VARCHAR(255) NOT NULL, INDEX IDX_161498D379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE identitee (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, telephone INT NOT NULL, ville VARCHAR(255) NOT NULL, code_postal INT NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D379F37AE5 FOREIGN KEY (id_user_id) REFERENCES identitee (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D379F37AE5');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE identitee');
    }
}
