<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215100733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau_contenir (bateau_id INT NOT NULL, contenir_id INT NOT NULL, INDEX IDX_93678FD7A9706509 (bateau_id), INDEX IDX_93678FD71982B715 (contenir_id), PRIMARY KEY(bateau_id, contenir_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_contenir (categorie_id INT NOT NULL, contenir_id INT NOT NULL, INDEX IDX_4160C97BCF5E72D (categorie_id), INDEX IDX_4160C971982B715 (contenir_id), PRIMARY KEY(categorie_id, contenir_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau_contenir ADD CONSTRAINT FK_93678FD7A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bateau_contenir ADD CONSTRAINT FK_93678FD71982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_contenir ADD CONSTRAINT FK_4160C97BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_contenir ADD CONSTRAINT FK_4160C971982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE traversee ADD liaison_id INT DEFAULT NULL, ADD bateau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501ED31185 FOREIGN KEY (liaison_id) REFERENCES liaison (id)');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('CREATE INDEX IDX_B688F501ED31185 ON traversee (liaison_id)');
        $this->addSql('CREATE INDEX IDX_B688F501A9706509 ON traversee (bateau_id)');
        $this->addSql('ALTER TABLE type ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE5729BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_8CDE5729BCF5E72D ON type (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bateau_contenir DROP FOREIGN KEY FK_93678FD7A9706509');
        $this->addSql('ALTER TABLE bateau_contenir DROP FOREIGN KEY FK_93678FD71982B715');
        $this->addSql('ALTER TABLE categorie_contenir DROP FOREIGN KEY FK_4160C97BCF5E72D');
        $this->addSql('ALTER TABLE categorie_contenir DROP FOREIGN KEY FK_4160C971982B715');
        $this->addSql('DROP TABLE bateau_contenir');
        $this->addSql('DROP TABLE categorie_contenir');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE5729BCF5E72D');
        $this->addSql('DROP INDEX IDX_8CDE5729BCF5E72D ON type');
        $this->addSql('ALTER TABLE type DROP categorie_id');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501ED31185');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501A9706509');
        $this->addSql('DROP INDEX IDX_B688F501ED31185 ON traversee');
        $this->addSql('DROP INDEX IDX_B688F501A9706509 ON traversee');
        $this->addSql('ALTER TABLE traversee DROP liaison_id, DROP bateau_id');
    }
}
