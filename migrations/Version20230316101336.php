<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316101336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau_categorie (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, nb_max INT NOT NULL, INDEX IDX_9269E920A9706509 (bateau_id), INDEX IDX_9269E920BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau_categorie ADD CONSTRAINT FK_9269E920A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE bateau_categorie ADD CONSTRAINT FK_9269E920BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bateau_categorie DROP FOREIGN KEY FK_9269E920A9706509');
        $this->addSql('ALTER TABLE bateau_categorie DROP FOREIGN KEY FK_9269E920BCF5E72D');
        $this->addSql('DROP TABLE bateau_categorie');
    }
}
