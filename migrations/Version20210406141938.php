<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406141938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE verplaatsing ADD user_id INT NOT NULL, ADD vervoersmiddel_id INT NOT NULL');
        $this->addSql('ALTER TABLE verplaatsing ADD CONSTRAINT FK_E0656B2BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE verplaatsing ADD CONSTRAINT FK_E0656B2BE074DE3E FOREIGN KEY (vervoersmiddel_id) REFERENCES vervoersmiddel (id)');
        $this->addSql('CREATE INDEX IDX_E0656B2BA76ED395 ON verplaatsing (user_id)');
        $this->addSql('CREATE INDEX IDX_E0656B2BE074DE3E ON verplaatsing (vervoersmiddel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE verplaatsing DROP FOREIGN KEY FK_E0656B2BA76ED395');
        $this->addSql('ALTER TABLE verplaatsing DROP FOREIGN KEY FK_E0656B2BE074DE3E');
        $this->addSql('DROP INDEX IDX_E0656B2BA76ED395 ON verplaatsing');
        $this->addSql('DROP INDEX IDX_E0656B2BE074DE3E ON verplaatsing');
        $this->addSql('ALTER TABLE verplaatsing DROP user_id, DROP vervoersmiddel_id');
    }
}
