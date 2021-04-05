<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405145533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE veroersmiddel_verplaatsing (veroersmiddel_id INT NOT NULL, verplaatsing_id INT NOT NULL, INDEX IDX_423C73F9F80888F (veroersmiddel_id), INDEX IDX_423C73F9E9884B6A (verplaatsing_id), PRIMARY KEY(veroersmiddel_id, verplaatsing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE veroersmiddel_verplaatsing ADD CONSTRAINT FK_423C73F9F80888F FOREIGN KEY (veroersmiddel_id) REFERENCES veroersmiddel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE veroersmiddel_verplaatsing ADD CONSTRAINT FK_423C73F9E9884B6A FOREIGN KEY (verplaatsing_id) REFERENCES verplaatsing (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarief ADD veroersmiddel_id INT NOT NULL');
        $this->addSql('ALTER TABLE tarief ADD CONSTRAINT FK_BF4873BEF80888F FOREIGN KEY (veroersmiddel_id) REFERENCES veroersmiddel (id)');
        $this->addSql('CREATE INDEX IDX_BF4873BEF80888F ON tarief (veroersmiddel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE veroersmiddel_verplaatsing');
        $this->addSql('ALTER TABLE tarief DROP FOREIGN KEY FK_BF4873BEF80888F');
        $this->addSql('DROP INDEX IDX_BF4873BEF80888F ON tarief');
        $this->addSql('ALTER TABLE tarief DROP veroersmiddel_id');
    }
}
