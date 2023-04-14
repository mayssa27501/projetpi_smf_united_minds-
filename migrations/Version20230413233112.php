<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413233112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D82CF1CF');
        $this->addSql('DROP INDEX IDX_6EEAA67D82CF1CF ON commande');
        $this->addSql('ALTER TABLE commande CHANGE id_oeuvre_id id_oeuvre INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE id_oeuvre id_oeuvre_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D82CF1CF FOREIGN KEY (id_oeuvre_id) REFERENCES oeuvre (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D82CF1CF ON commande (id_oeuvre_id)');
    }
}
