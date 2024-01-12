<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240112105705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8C54BBBFB7');
        $this->addSql('ALTER TABLE times DROP FOREIGN KEY FK_1DD7EE8C9DE58C46');
        $this->addSql('DROP TABLE times');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE times (id INT AUTO_INCREMENT NOT NULL, sports_id INT NOT NULL, athletes_id INT NOT NULL, time DOUBLE PRECISION NOT NULL, INDEX IDX_1DD7EE8C9DE58C46 (athletes_id), INDEX IDX_1DD7EE8C54BBBFB7 (sports_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8C54BBBFB7 FOREIGN KEY (sports_id) REFERENCES sports (id)');
        $this->addSql('ALTER TABLE times ADD CONSTRAINT FK_1DD7EE8C9DE58C46 FOREIGN KEY (athletes_id) REFERENCES athletes (id)');
    }
}
