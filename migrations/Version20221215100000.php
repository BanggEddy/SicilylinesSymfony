<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215100000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison ADD port_id INT DEFAULT NULL, ADD secteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC3776E92A9C FOREIGN KEY (port_id) REFERENCES port (id)');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC379F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('CREATE INDEX IDX_225AC3776E92A9C ON liaison (port_id)');
        $this->addSql('CREATE INDEX IDX_225AC379F7E4405 ON liaison (secteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC3776E92A9C');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC379F7E4405');
        $this->addSql('DROP INDEX IDX_225AC3776E92A9C ON liaison');
        $this->addSql('DROP INDEX IDX_225AC379F7E4405 ON liaison');
        $this->addSql('ALTER TABLE liaison DROP port_id, DROP secteur_id');
    }
}
