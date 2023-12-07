<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207111420 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sprint_match_data ADD athletes_id INT NOT NULL');
        $this->addSql('ALTER TABLE sprint_match_data ADD CONSTRAINT FK_BAFFA3E79DE58C46 FOREIGN KEY (athletes_id) REFERENCES athletes (id)');
        $this->addSql('CREATE INDEX IDX_BAFFA3E79DE58C46 ON sprint_match_data (athletes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sprint_match_data DROP FOREIGN KEY FK_BAFFA3E79DE58C46');
        $this->addSql('DROP INDEX IDX_BAFFA3E79DE58C46 ON sprint_match_data');
        $this->addSql('ALTER TABLE sprint_match_data DROP athletes_id');
    }
}
