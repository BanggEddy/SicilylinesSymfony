<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316101434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41B83297E7');
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41C54C8C93');
        $this->addSql('DROP TABLE reservation_type');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_type (reservation_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_9AE79A41C54C8C93 (type_id), INDEX IDX_9AE79A41B83297E7 (reservation_id), PRIMARY KEY(reservation_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }
}
