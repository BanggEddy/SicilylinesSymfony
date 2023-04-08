<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215100824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau_proposer (bateau_id INT NOT NULL, proposer_id INT NOT NULL, INDEX IDX_8E70AE3FA9706509 (bateau_id), INDEX IDX_8E70AE3FB13FA634 (proposer_id), PRIMARY KEY(bateau_id, proposer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_contenir (equipement_id INT NOT NULL, contenir_id INT NOT NULL, INDEX IDX_234043D9806F0F5C (equipement_id), INDEX IDX_234043D91982B715 (contenir_id), PRIMARY KEY(equipement_id, contenir_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau_proposer ADD CONSTRAINT FK_8E70AE3FA9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bateau_proposer ADD CONSTRAINT FK_8E70AE3FB13FA634 FOREIGN KEY (proposer_id) REFERENCES proposer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_contenir ADD CONSTRAINT FK_234043D9806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipement_contenir ADD CONSTRAINT FK_234043D91982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bateau_proposer DROP FOREIGN KEY FK_8E70AE3FA9706509');
        $this->addSql('ALTER TABLE bateau_proposer DROP FOREIGN KEY FK_8E70AE3FB13FA634');
        $this->addSql('ALTER TABLE equipement_contenir DROP FOREIGN KEY FK_234043D9806F0F5C');
        $this->addSql('ALTER TABLE equipement_contenir DROP FOREIGN KEY FK_234043D91982B715');
        $this->addSql('DROP TABLE bateau_proposer');
        $this->addSql('DROP TABLE equipement_contenir');
    }
}
