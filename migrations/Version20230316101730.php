<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316101730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC3776E92A9C');
        $this->addSql('DROP INDEX IDX_225AC3776E92A9C ON liaison');
        $this->addSql('ALTER TABLE liaison ADD portdepart_id INT DEFAULT NULL, CHANGE port_id portarrive_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC37A4A19549 FOREIGN KEY (portarrive_id) REFERENCES port (id)');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC37FEA1ED4A FOREIGN KEY (portdepart_id) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_225AC37A4A19549 ON liaison (portarrive_id)');
        $this->addSql('CREATE INDEX IDX_225AC37FEA1ED4A ON liaison (portdepart_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC37A4A19549');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC37FEA1ED4A');
        $this->addSql('DROP INDEX IDX_225AC37A4A19549 ON liaison');
        $this->addSql('DROP INDEX IDX_225AC37FEA1ED4A ON liaison');
        $this->addSql('ALTER TABLE liaison ADD port_id INT DEFAULT NULL, DROP portarrive_id, DROP portdepart_id');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC3776E92A9C FOREIGN KEY (port_id) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_225AC3776E92A9C ON liaison (port_id)');
    }
}
