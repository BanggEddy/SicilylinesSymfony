<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316101127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau_equipement (id INT AUTO_INCREMENT NOT NULL, equipement_id INT DEFAULT NULL, bateau_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_A2B506B1806F0F5C (equipement_id), INDEX IDX_A2B506B1A9706509 (bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau_equipement ADD CONSTRAINT FK_A2B506B1806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE bateau_equipement ADD CONSTRAINT FK_A2B506B1A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bateau_equipement DROP FOREIGN KEY FK_A2B506B1806F0F5C');
        $this->addSql('ALTER TABLE bateau_equipement DROP FOREIGN KEY FK_A2B506B1A9706509');
        $this->addSql('DROP TABLE bateau_equipement');
    }
}
