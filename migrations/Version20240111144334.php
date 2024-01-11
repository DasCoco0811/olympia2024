<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240111144334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE times_swimming (id INT AUTO_INCREMENT NOT NULL, athlete_id INT NOT NULL, time DOUBLE PRECISION NOT NULL, penalty DOUBLE PRECISION DEFAULT NULL, disqualified TINYINT(1) NOT NULL, INDEX IDX_6F5E8A94FE6BCB8B (athlete_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE times_swimming ADD CONSTRAINT FK_6F5E8A94FE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athletes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE times_swimming DROP FOREIGN KEY FK_6F5E8A94FE6BCB8B');
        $this->addSql('DROP TABLE times_swimming');
    }
}
