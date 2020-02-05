<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200205100930 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adherents (id INT AUTO_INCREMENT NOT NULL, nom_adherent VARCHAR(255) NOT NULL, prenom_adherent VARCHAR(255) NOT NULL, adresse_adherent VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auteurs (id INT AUTO_INCREMENT NOT NULL, nom_auteur VARCHAR(255) NOT NULL, prenom_auteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliotheques (id INT AUTO_INCREMENT NOT NULL, exemplaires_id INT DEFAULT NULL, nom_biblio VARCHAR(255) NOT NULL, adresse_biblio VARCHAR(1000) NOT NULL, INDEX IDX_132562F5AB40EED1 (exemplaires_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exemplaires (id INT AUTO_INCREMENT NOT NULL, ouvrages_id INT DEFAULT NULL, INDEX IDX_551C55F5C6F22A2 (ouvrages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exemplaires_adherents (exemplaires_id INT NOT NULL, adherents_id INT NOT NULL, INDEX IDX_6A4B9B83AB40EED1 (exemplaires_id), INDEX IDX_6A4B9B8315364D07 (adherents_id), PRIMARY KEY(exemplaires_id, adherents_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mots_cles (id INT AUTO_INCREMENT NOT NULL, mot VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ouvrages (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(1000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ouvrages_auteurs (ouvrages_id INT NOT NULL, auteurs_id INT NOT NULL, INDEX IDX_EE8B8D355C6F22A2 (ouvrages_id), INDEX IDX_EE8B8D35AE784107 (auteurs_id), PRIMARY KEY(ouvrages_id, auteurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ouvrages_mots_cles (ouvrages_id INT NOT NULL, mots_cles_id INT NOT NULL, INDEX IDX_B09A2585C6F22A2 (ouvrages_id), INDEX IDX_B09A258C0BE80DB (mots_cles_id), PRIMARY KEY(ouvrages_id, mots_cles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rayons (id INT AUTO_INCREMENT NOT NULL, ouvrages_id INT NOT NULL, intitule_rayon VARCHAR(255) NOT NULL, INDEX IDX_34B456305C6F22A2 (ouvrages_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliotheques ADD CONSTRAINT FK_132562F5AB40EED1 FOREIGN KEY (exemplaires_id) REFERENCES exemplaires (id)');
        $this->addSql('ALTER TABLE exemplaires ADD CONSTRAINT FK_551C55F5C6F22A2 FOREIGN KEY (ouvrages_id) REFERENCES ouvrages (id)');
        $this->addSql('ALTER TABLE exemplaires_adherents ADD CONSTRAINT FK_6A4B9B83AB40EED1 FOREIGN KEY (exemplaires_id) REFERENCES exemplaires (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exemplaires_adherents ADD CONSTRAINT FK_6A4B9B8315364D07 FOREIGN KEY (adherents_id) REFERENCES adherents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ouvrages_auteurs ADD CONSTRAINT FK_EE8B8D355C6F22A2 FOREIGN KEY (ouvrages_id) REFERENCES ouvrages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ouvrages_auteurs ADD CONSTRAINT FK_EE8B8D35AE784107 FOREIGN KEY (auteurs_id) REFERENCES auteurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ouvrages_mots_cles ADD CONSTRAINT FK_B09A2585C6F22A2 FOREIGN KEY (ouvrages_id) REFERENCES ouvrages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ouvrages_mots_cles ADD CONSTRAINT FK_B09A258C0BE80DB FOREIGN KEY (mots_cles_id) REFERENCES mots_cles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rayons ADD CONSTRAINT FK_34B456305C6F22A2 FOREIGN KEY (ouvrages_id) REFERENCES ouvrages (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE exemplaires_adherents DROP FOREIGN KEY FK_6A4B9B8315364D07');
        $this->addSql('ALTER TABLE ouvrages_auteurs DROP FOREIGN KEY FK_EE8B8D35AE784107');
        $this->addSql('ALTER TABLE bibliotheques DROP FOREIGN KEY FK_132562F5AB40EED1');
        $this->addSql('ALTER TABLE exemplaires_adherents DROP FOREIGN KEY FK_6A4B9B83AB40EED1');
        $this->addSql('ALTER TABLE ouvrages_mots_cles DROP FOREIGN KEY FK_B09A258C0BE80DB');
        $this->addSql('ALTER TABLE exemplaires DROP FOREIGN KEY FK_551C55F5C6F22A2');
        $this->addSql('ALTER TABLE ouvrages_auteurs DROP FOREIGN KEY FK_EE8B8D355C6F22A2');
        $this->addSql('ALTER TABLE ouvrages_mots_cles DROP FOREIGN KEY FK_B09A2585C6F22A2');
        $this->addSql('ALTER TABLE rayons DROP FOREIGN KEY FK_34B456305C6F22A2');
        $this->addSql('DROP TABLE adherents');
        $this->addSql('DROP TABLE auteurs');
        $this->addSql('DROP TABLE bibliotheques');
        $this->addSql('DROP TABLE exemplaires');
        $this->addSql('DROP TABLE exemplaires_adherents');
        $this->addSql('DROP TABLE mots_cles');
        $this->addSql('DROP TABLE ouvrages');
        $this->addSql('DROP TABLE ouvrages_auteurs');
        $this->addSql('DROP TABLE ouvrages_mots_cles');
        $this->addSql('DROP TABLE rayons');
    }
}
