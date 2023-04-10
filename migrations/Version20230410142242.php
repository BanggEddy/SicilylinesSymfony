<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410142242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD pays VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD telephone INT NOT NULL, ADD civilite VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD mdp VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE liaison DROP dure');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison ADD dure VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client DROP pays, DROP prenom, DROP telephone, DROP civilite, DROP email, DROP mdp');
    }
}
