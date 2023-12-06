<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106104255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athletes ADD CONSTRAINT FK_57A7E4D6AEBAE514 FOREIGN KEY (countries_id) REFERENCES countries (id)');
        $this->addSql('CREATE INDEX IDX_57A7E4D6AEBAE514 ON athletes (countries_id)');
        $this->addSql('ALTER TABLE sports ADD description VARCHAR(511) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE athletes DROP FOREIGN KEY FK_57A7E4D6AEBAE514');
        $this->addSql('DROP INDEX IDX_57A7E4D6AEBAE514 ON athletes');
        $this->addSql('ALTER TABLE sports DROP description');
    }
}
