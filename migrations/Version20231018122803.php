<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018122803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sports ADD times_id INT NOT NULL');
        $this->addSql('ALTER TABLE sports ADD CONSTRAINT FK_73C9F91C5624BEDC FOREIGN KEY (times_id) REFERENCES times (id)');
        $this->addSql('CREATE INDEX IDX_73C9F91C5624BEDC ON sports (times_id)');
        $this->addSql('ALTER TABLE times DROP sport, DROP athlete, CHANGE time time DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sports DROP FOREIGN KEY FK_73C9F91C5624BEDC');
        $this->addSql('DROP INDEX IDX_73C9F91C5624BEDC ON sports');
        $this->addSql('ALTER TABLE sports DROP times_id');
        $this->addSql('ALTER TABLE times ADD sport VARCHAR(64) NOT NULL, ADD athlete VARCHAR(64) NOT NULL, CHANGE time time TIME NOT NULL');
    }
}
