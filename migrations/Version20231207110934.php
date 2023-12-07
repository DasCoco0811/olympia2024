<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207110934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sprint_match_data (id INT AUTO_INCREMENT NOT NULL, matches_id INT NOT NULL, time DOUBLE PRECISION NOT NULL, position VARCHAR(2) NOT NULL, INDEX IDX_BAFFA3E74B30DD19 (matches_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sprint_match_data_athletes (sprint_match_data_id INT NOT NULL, athletes_id INT NOT NULL, INDEX IDX_2A95D7D862C40308 (sprint_match_data_id), INDEX IDX_2A95D7D89DE58C46 (athletes_id), PRIMARY KEY(sprint_match_data_id, athletes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sprint_match_data ADD CONSTRAINT FK_BAFFA3E74B30DD19 FOREIGN KEY (matches_id) REFERENCES matches (id)');
        $this->addSql('ALTER TABLE sprint_match_data_athletes ADD CONSTRAINT FK_2A95D7D862C40308 FOREIGN KEY (sprint_match_data_id) REFERENCES sprint_match_data (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sprint_match_data_athletes ADD CONSTRAINT FK_2A95D7D89DE58C46 FOREIGN KEY (athletes_id) REFERENCES athletes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sprint_match_data DROP FOREIGN KEY FK_BAFFA3E74B30DD19');
        $this->addSql('ALTER TABLE sprint_match_data_athletes DROP FOREIGN KEY FK_2A95D7D862C40308');
        $this->addSql('ALTER TABLE sprint_match_data_athletes DROP FOREIGN KEY FK_2A95D7D89DE58C46');
        $this->addSql('DROP TABLE sprint_match_data');
        $this->addSql('DROP TABLE sprint_match_data_athletes');
    }
}
