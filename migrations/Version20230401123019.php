<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230401123019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_type (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, nombre INT NOT NULL, INDEX IDX_9AE79A41C54C8C93 (type_id), INDEX IDX_9AE79A41B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE client ADD pays VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD telephone INT NOT NULL, ADD civilite VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41C54C8C93');
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41B83297E7');
        $this->addSql('DROP TABLE reservation_type');
        $this->addSql('ALTER TABLE client DROP pays, DROP prenom, DROP telephone, DROP civilite, DROP email, DROP password');
    }
}
