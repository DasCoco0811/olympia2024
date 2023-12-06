<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231019070257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8CAC78BCF8');
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8CFE6BCB8B');
        $this->addSql('DROP TABLE medals');
        $this->addSql('DROP TABLE times');
        $this->addSql('ALTER TABLE athletes DROP FOREIGN KEY FK_57A7E4D6AC78BCF8');
        $this->addSql('DROP INDEX IDX_57A7E4D6AC78BCF8 ON athletes');
        $this->addSql('ALTER TABLE athletes ADD name VARCHAR(255) NOT NULL, DROP first_name, DROP last_name, DROP country, DROP description, DROP birthdate, DROP sex, CHANGE sport_id sports_id INT NOT NULL');
        $this->addSql('ALTER TABLE athletes ADD CONSTRAINT FK_57A7E4D654BBBFB7 FOREIGN KEY (sports_id) REFERENCES sports (id)');
        $this->addSql('CREATE INDEX IDX_57A7E4D654BBBFB7 ON athletes (sports_id)');
        $this->addSql('ALTER TABLE sports CHANGE name name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medals (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(64) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ranking INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE times (id INT AUTO_INCREMENT NOT NULL, athlete_id INT NOT NULL, sport_id INT NOT NULL, time DOUBLE PRECISION NOT NULL, INDEX IDX_1DD7EE8CFE6BCB8B (athlete_id), INDEX IDX_1DD7EE8CAC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8CAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sports (id)');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8CFE6BCB8B FOREIGN KEY (athlete_id) REFERENCES athletes (id)');
        $this->addSql('ALTER TABLE athletes DROP FOREIGN KEY FK_57A7E4D654BBBFB7');
        $this->addSql('DROP INDEX IDX_57A7E4D654BBBFB7 ON athletes');
        $this->addSql('ALTER TABLE athletes ADD first_name VARCHAR(64) NOT NULL, ADD last_name VARCHAR(64) NOT NULL, ADD country VARCHAR(64) NOT NULL, ADD description VARCHAR(1023) DEFAULT NULL, ADD birthdate DATE NOT NULL, ADD sex VARCHAR(6) NOT NULL, DROP name, CHANGE sports_id sport_id INT NOT NULL');
        $this->addSql('ALTER TABLE athletes ADD CONSTRAINT FK_57A7E4D6AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sports (id)');
        $this->addSql('CREATE INDEX IDX_57A7E4D6AC78BCF8 ON athletes (sport_id)');
        $this->addSql('ALTER TABLE sports CHANGE name name VARCHAR(64) NOT NULL');
    }
}
