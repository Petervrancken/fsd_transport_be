<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406144314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vervoersmiddel ADD user_id INT NOT NULL, ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE vervoersmiddel ADD CONSTRAINT FK_8C9D106EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vervoersmiddel ADD CONSTRAINT FK_8C9D106EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_8C9D106EA76ED395 ON vervoersmiddel (user_id)');
        $this->addSql('CREATE INDEX IDX_8C9D106EBCF5E72D ON vervoersmiddel (categorie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vervoersmiddel DROP FOREIGN KEY FK_8C9D106EA76ED395');
        $this->addSql('ALTER TABLE vervoersmiddel DROP FOREIGN KEY FK_8C9D106EBCF5E72D');
        $this->addSql('DROP INDEX IDX_8C9D106EA76ED395 ON vervoersmiddel');
        $this->addSql('DROP INDEX IDX_8C9D106EBCF5E72D ON vervoersmiddel');
        $this->addSql('ALTER TABLE vervoersmiddel DROP user_id, DROP categorie_id');
    }
}
