<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406142901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarief ADD vervoersmiddel_id INT NOT NULL');
        $this->addSql('ALTER TABLE tarief ADD CONSTRAINT FK_BF4873BEE074DE3E FOREIGN KEY (vervoersmiddel_id) REFERENCES vervoersmiddel (id)');
        $this->addSql('CREATE INDEX IDX_BF4873BEE074DE3E ON tarief (vervoersmiddel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarief DROP FOREIGN KEY FK_BF4873BEE074DE3E');
        $this->addSql('DROP INDEX IDX_BF4873BEE074DE3E ON tarief');
        $this->addSql('ALTER TABLE tarief DROP vervoersmiddel_id');
    }
}
