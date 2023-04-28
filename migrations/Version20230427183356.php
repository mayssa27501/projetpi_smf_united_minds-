<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427183356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
    //    $this->addSql('CREATE TABLE oeuvre dart (id_oeuvre INT AUTO_INCREMENT NOT NULL, id_u INT DEFAULT NULL, type_oeuvre VARCHAR(255) NOT NULL, nombre_oeuvre INT NOT NULL, couleur_oeuvre VARCHAR(255) NOT NULL, prix_oeuvre INT NOT NULL, dimension_oeuvre VARCHAR(255) NOT NULL, INDEX id_u (id_u), PRIMARY KEY(id_oeuvre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, membre_id INT NOT NULL, evenement_id INT NOT NULL, INDEX IDX_AB55E24F6A99F74A (membre_id), INDEX IDX_AB55E24FFD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE oeuvre dart ADD CONSTRAINT FK_1A511D5635F8C041 FOREIGN KEY (id_u) REFERENCES membre (id_user)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24F6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (idUser)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (idEvenement)');
        //$this->addSql('ALTER TABLE oeuvre d\'art DROP FOREIGN KEY oeuvre d\'art_ibfk_1');
        //$this->addSql('DROP TABLE oeuvre d\'art');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY article_ibfk_1');
        $this->addSql('ALTER TABLE article CHANGE id_u id_u INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6635F8C041 FOREIGN KEY (id_u) REFERENCES membre (id_user)');
        $this->addSql('ALTER TABLE categorie_article DROP FOREIGN KEY categorie_article_ibfk_1');
        $this->addSql('ALTER TABLE categorie_article CHANGE id_artic id_artic INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie_article ADD CONSTRAINT FK_5DB9A0C47EBFA047 FOREIGN KEY (id_artic) REFERENCES article (id_artic)');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY commande_ibfk_1');
        $this->addSql('ALTER TABLE commande CHANGE id_u id_u INT DEFAULT NULL, CHANGE id_oeuvre id_oeuvre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D13C99B13 FOREIGN KEY (id_oeuvre) REFERENCES oeuvre dart (id_oeuvre)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D35F8C041 FOREIGN KEY (id_u) REFERENCES membre (id_user)');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_1');
        $this->addSql('ALTER TABLE commentaire CHANGE id_forum id_forum INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC6BAEFFFD FOREIGN KEY (id_forum) REFERENCES forum (id_forum)');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY categorie_ibfk_bouftika');
        $this->addSql('ALTER TABLE evenement CHANGE id_categorie id_categorie INT DEFAULT NULL, CHANGE likes likes INT NOT NULL, CHANGE nb_participants nb_participants INT NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EC9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie)');
        $this->addSql('ALTER TABLE forum DROP FOREIGN KEY forum_ibfk_1');
        $this->addSql('ALTER TABLE forum CHANGE id_u id_u INT DEFAULT NULL');
        $this->addSql('ALTER TABLE forum ADD CONSTRAINT FK_852BBECD35F8C041 FOREIGN KEY (id_u) REFERENCES membre (id_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D13C99B13');
        $this->addSql('CREATE TABLE oeuvre d\'art (id_oeuvre INT AUTO_INCREMENT NOT NULL, id_u INT NOT NULL, type_oeuvre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nombre_oeuvre INT NOT NULL, couleur_oeuvre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prix_oeuvre INT NOT NULL, dimension_oeuvre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX id_u (id_u), PRIMARY KEY(id_oeuvre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE oeuvre d\'art ADD CONSTRAINT oeuvre d\'art_ibfk_1 FOREIGN KEY (id_u) REFERENCES membre (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre dart DROP FOREIGN KEY FK_1A511D5635F8C041');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24F6A99F74A');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FFD02F13');
        $this->addSql('DROP TABLE oeuvre dart');
        $this->addSql('DROP TABLE participation');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6635F8C041');
        $this->addSql('ALTER TABLE article CHANGE id_u id_u INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT article_ibfk_1 FOREIGN KEY (id_u) REFERENCES membre (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_article DROP FOREIGN KEY FK_5DB9A0C47EBFA047');
        $this->addSql('ALTER TABLE categorie_article CHANGE id_artic id_artic INT NOT NULL');
        $this->addSql('ALTER TABLE categorie_article ADD CONSTRAINT categorie_article_ibfk_1 FOREIGN KEY (id_artic) REFERENCES article (id_artic) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D35F8C041');
        $this->addSql('ALTER TABLE commande CHANGE id_oeuvre id_oeuvre INT NOT NULL, CHANGE id_u id_u INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT commande_ibfk_1 FOREIGN KEY (id_u) REFERENCES membre (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC6BAEFFFD');
        $this->addSql('ALTER TABLE commentaire CHANGE id_forum id_forum INT NOT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_1 FOREIGN KEY (id_forum) REFERENCES forum (id_forum) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EC9486A13');
        $this->addSql('ALTER TABLE evenement CHANGE id_categorie id_categorie INT NOT NULL, CHANGE likes likes INT DEFAULT 0 NOT NULL, CHANGE nb_participants nb_participants INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT categorie_ibfk_bouftika FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE forum DROP FOREIGN KEY FK_852BBECD35F8C041');
        $this->addSql('ALTER TABLE forum CHANGE id_u id_u INT NOT NULL');
        $this->addSql('ALTER TABLE forum ADD CONSTRAINT forum_ibfk_1 FOREIGN KEY (id_u) REFERENCES membre (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
