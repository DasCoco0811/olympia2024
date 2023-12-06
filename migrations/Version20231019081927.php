<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019081927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE athletes (id INT AUTO_INCREMENT NOT NULL, sports_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, description VARCHAR(1023) DEFAULT NULL, countrycode VARCHAR(2) NOT NULL, birthdate DATE NOT NULL, INDEX IDX_57A7E4D654BBBFB7 (sports_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medals (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, ranking INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sports (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE times (id INT AUTO_INCREMENT NOT NULL, sports_id INT NOT NULL, athletes_id INT NOT NULL, time DOUBLE PRECISION NOT NULL, INDEX IDX_1DD7EE8C54BBBFB7 (sports_id), INDEX IDX_1DD7EE8C9DE58C46 (athletes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE athletes ADD CONSTRAINT FK_57A7E4D654BBBFB7 FOREIGN KEY (sports_id) REFERENCES sports (id)');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8C54BBBFB7 FOREIGN KEY (sports_id) REFERENCES sports (id)');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8C9DE58C46 FOREIGN KEY (athletes_id) REFERENCES athletes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athletes DROP FOREIGN KEY FK_57A7E4D654BBBFB7');
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8C54BBBFB7');
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8C9DE58C46');
        $this->addSql('DROP TABLE athletes');
        $this->addSql('DROP TABLE medals');
        $this->addSql('DROP TABLE sports');
        $this->addSql('DROP TABLE times');
    }
}