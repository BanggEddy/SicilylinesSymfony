<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316102021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE liaison_periode_type (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, periode_id INT DEFAULT NULL, liaison_id INT DEFAULT NULL, tarif DOUBLE PRECISION NOT NULL, INDEX IDX_EB210873C54C8C93 (type_id), INDEX IDX_EB210873F384C1CF (periode_id), INDEX IDX_EB210873ED31185 (liaison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liaison_periode_type ADD CONSTRAINT FK_EB210873C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE liaison_periode_type ADD CONSTRAINT FK_EB210873F384C1CF FOREIGN KEY (periode_id) REFERENCES periode (id)');
        $this->addSql('ALTER TABLE liaison_periode_type ADD CONSTRAINT FK_EB210873ED31185 FOREIGN KEY (liaison_id) REFERENCES liaison (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liaison_periode_type DROP FOREIGN KEY FK_EB210873C54C8C93');
        $this->addSql('ALTER TABLE liaison_periode_type DROP FOREIGN KEY FK_EB210873F384C1CF');
        $this->addSql('ALTER TABLE liaison_periode_type DROP FOREIGN KEY FK_EB210873ED31185');
        $this->addSql('DROP TABLE liaison_periode_type');
    }
}
