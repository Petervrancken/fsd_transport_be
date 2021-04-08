<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210408140227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE verplaatsing ADD km_start INT NOT NULL, ADD km_stop INT NOT NULL, ADD loc_start VARCHAR(255) NOT NULL, ADD loc_stop VARCHAR(255) NOT NULL, DROP kmStart, DROP kmStop, DROP locStart, DROP locStop');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE verplaatsing ADD kmStart INT NOT NULL, ADD kmStop INT NOT NULL, ADD locStart VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD locStop VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP km_start, DROP km_stop, DROP loc_start, DROP loc_stop');
    }
}
