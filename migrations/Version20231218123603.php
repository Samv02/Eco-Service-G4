<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218123603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, num_rue_adresse INT NOT NULL, nom_rue_adresse VARCHAR(255) NOT NULL, code_postal_adresse INT NOT NULL, ville_adresse VARCHAR(255) NOT NULL, pays_adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_cat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', qte_produit INT NOT NULL, INDEX IDX_6EEAA67D79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composer (id INT AUTO_INCREMENT NOT NULL, id_commande_id INT NOT NULL, id_produit_id INT NOT NULL, INDEX IDX_987306D89AF8E3A3 (id_commande_id), INDEX IDX_987306D8AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE construire (id INT AUTO_INCREMENT NOT NULL, id_recette_id INT NOT NULL, id_produit_id INT NOT NULL, INDEX IDX_6AF633952CBBAF3E (id_recette_id), INDEX IDX_6AF63395AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lier (id INT AUTO_INCREMENT NOT NULL, id_ticket_id INT NOT NULL, id_user_id INT NOT NULL, id_commande_id INT NOT NULL, INDEX IDX_B133E8FAF035FBF5 (id_ticket_id), INDEX IDX_B133E8FA79F37AE5 (id_user_id), INDEX IDX_B133E8FA9AF8E3A3 (id_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, nom_marque VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_cat_id INT NOT NULL, id_marque_id INT DEFAULT NULL, nom_produit VARCHAR(50) NOT NULL, img_produit VARCHAR(120) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_29A5EC27C09A1CAE (id_cat_id), INDEX IDX_29A5EC27C8120595 (id_marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recettes (id INT AUTO_INCREMENT NOT NULL, nom_recette VARCHAR(255) NOT NULL, desc_recette LONGTEXT NOT NULL, img_recette VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, relation_id INT NOT NULL, nom_ticket VARCHAR(255) NOT NULL, contenu_ticket LONGTEXT NOT NULL, INDEX IDX_97A0ADA33256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_adresse_id INT DEFAULT NULL, nom_utilisateur VARCHAR(255) NOT NULL, prenom_utilisateur VARCHAR(255) NOT NULL, e_mail_utilisateur VARCHAR(255) NOT NULL, mdp_utilisateur VARCHAR(255) NOT NULL, img_utilisateur VARCHAR(255) NOT NULL, actif_utilisateur TINYINT(1) NOT NULL, role TINYINT(1) NOT NULL, INDEX IDX_1D1C63B3E86D5C8B (id_adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D79F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE composer ADD CONSTRAINT FK_987306D89AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE composer ADD CONSTRAINT FK_987306D8AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE construire ADD CONSTRAINT FK_6AF633952CBBAF3E FOREIGN KEY (id_recette_id) REFERENCES recettes (id)');
        $this->addSql('ALTER TABLE construire ADD CONSTRAINT FK_6AF63395AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE lier ADD CONSTRAINT FK_B133E8FAF035FBF5 FOREIGN KEY (id_ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE lier ADD CONSTRAINT FK_B133E8FA79F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE lier ADD CONSTRAINT FK_B133E8FA9AF8E3A3 FOREIGN KEY (id_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27C09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27C8120595 FOREIGN KEY (id_marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA33256915B FOREIGN KEY (relation_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3E86D5C8B FOREIGN KEY (id_adresse_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D79F37AE5');
        $this->addSql('ALTER TABLE composer DROP FOREIGN KEY FK_987306D89AF8E3A3');
        $this->addSql('ALTER TABLE composer DROP FOREIGN KEY FK_987306D8AABEFE2C');
        $this->addSql('ALTER TABLE construire DROP FOREIGN KEY FK_6AF633952CBBAF3E');
        $this->addSql('ALTER TABLE construire DROP FOREIGN KEY FK_6AF63395AABEFE2C');
        $this->addSql('ALTER TABLE lier DROP FOREIGN KEY FK_B133E8FAF035FBF5');
        $this->addSql('ALTER TABLE lier DROP FOREIGN KEY FK_B133E8FA79F37AE5');
        $this->addSql('ALTER TABLE lier DROP FOREIGN KEY FK_B133E8FA9AF8E3A3');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27C09A1CAE');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27C8120595');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA33256915B');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3E86D5C8B');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE composer');
        $this->addSql('DROP TABLE construire');
        $this->addSql('DROP TABLE lier');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE recettes');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
