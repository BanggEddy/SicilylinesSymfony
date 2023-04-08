<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316101215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_contenir DROP FOREIGN KEY FK_4160C971982B715');
        $this->addSql('ALTER TABLE categorie_contenir DROP FOREIGN KEY FK_4160C97BCF5E72D');
        $this->addSql('ALTER TABLE bateau_contenir DROP FOREIGN KEY FK_93678FD71982B715');
        $this->addSql('ALTER TABLE bateau_contenir DROP FOREIGN KEY FK_93678FD7A9706509');
        $this->addSql('DROP TABLE categorie_contenir');
        $this->addSql('DROP TABLE bateau_contenir');
        $this->addSql('DROP TABLE contenir');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_contenir (categorie_id INT NOT NULL, contenir_id INT NOT NULL, INDEX IDX_4160C97BCF5E72D (categorie_id), INDEX IDX_4160C971982B715 (contenir_id), PRIMARY KEY(categorie_id, contenir_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE bateau_contenir (bateau_id INT NOT NULL, contenir_id INT NOT NULL, INDEX IDX_93678FD7A9706509 (bateau_id), INDEX IDX_93678FD71982B715 (contenir_id), PRIMARY KEY(bateau_id, contenir_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, nb_max VARCHAR(125) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categorie_contenir ADD CONSTRAINT FK_4160C971982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_contenir ADD CONSTRAINT FK_4160C97BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bateau_contenir ADD CONSTRAINT FK_93678FD71982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bateau_contenir ADD CONSTRAINT FK_93678FD7A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id) ON DELETE CASCADE');
    }
}
