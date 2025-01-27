<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018124634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE athletes (id INT AUTO_INCREMENT NOT NULL, sport_id INT NOT NULL, first_name VARCHAR(64) NOT NULL, last_name VARCHAR(64) NOT NULL, country VARCHAR(64) NOT NULL, INDEX IDX_57A7E4D6AC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sports (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE times (id INT AUTO_INCREMENT NOT NULL, athlete_id INT NOT NULL, sport_id INT NOT NULL, time DOUBLE PRECISION NOT NULL, INDEX IDX_1DD7EE8CFE6BCB8B (athlete_id), INDEX IDX_1DD7EE8CAC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE athletes ADD CONSTRAINT FK_57A7E4D6AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sports (id)');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8CFE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athletes (id)');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8CAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sports (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athletes DROP FOREIGN KEY FK_57A7E4D6AC78BCF8');
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8CFE6BCB8B');
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8CAC78BCF8');
        $this->addSql('DROP TABLE athletes');
        $this->addSql('DROP TABLE sports');
        $this->addSql('DROP TABLE times');
    }
}
