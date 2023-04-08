<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215095619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_traversee (reservation_id INT NOT NULL, traversee_id INT NOT NULL, INDEX IDX_ACCF949EB83297E7 (reservation_id), INDEX IDX_ACCF949EED2BB15B (traversee_id), PRIMARY KEY(reservation_id, traversee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_type (reservation_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_9AE79A41B83297E7 (reservation_id), INDEX IDX_9AE79A41C54C8C93 (type_id), PRIMARY KEY(reservation_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_traversee ADD CONSTRAINT FK_ACCF949EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_traversee ADD CONSTRAINT FK_ACCF949EED2BB15B FOREIGN KEY (traversee_id) REFERENCES traversee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_traversee DROP FOREIGN KEY FK_ACCF949EB83297E7');
        $this->addSql('ALTER TABLE reservation_traversee DROP FOREIGN KEY FK_ACCF949EED2BB15B');
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41B83297E7');
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41C54C8C93');
        $this->addSql('DROP TABLE reservation_traversee');
        $this->addSql('DROP TABLE reservation_type');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP client_id');
    }
}
