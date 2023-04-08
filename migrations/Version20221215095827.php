<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215095827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifer ADD periode_id INT DEFAULT NULL, ADD liaison_id INT DEFAULT NULL, ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFF384C1CF FOREIGN KEY (periode_id) REFERENCES periode (id)');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFED31185 FOREIGN KEY (liaison_id) REFERENCES liaison (id)');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_6904C4FFF384C1CF ON tarifer (periode_id)');
        $this->addSql('CREATE INDEX IDX_6904C4FFED31185 ON tarifer (liaison_id)');
        $this->addSql('CREATE INDEX IDX_6904C4FFC54C8C93 ON tarifer (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFF384C1CF');
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFED31185');
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFC54C8C93');
        $this->addSql('DROP INDEX IDX_6904C4FFF384C1CF ON tarifer');
        $this->addSql('DROP INDEX IDX_6904C4FFED31185 ON tarifer');
        $this->addSql('DROP INDEX IDX_6904C4FFC54C8C93 ON tarifer');
        $this->addSql('ALTER TABLE tarifer DROP periode_id, DROP liaison_id, DROP type_id');
    }
}
