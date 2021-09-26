<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920122253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bieres (id INT AUTO_INCREMENT NOT NULL, libelle_biere VARCHAR(255) NOT NULL, marque_biere VARCHAR(255) NOT NULL, titre_alcool_biere DOUBLE PRECISION NOT NULL, contenance_biere VARCHAR(255) DEFAULT NULL, prix_achat_biere DOUBLE PRECISION NOT NULL, prix_vente_biere DOUBLE PRECISION NOT NULL, prix_ttc_biere DOUBLE PRECISION NOT NULL, type1_biere VARCHAR(255) NOT NULL, type2_biere VARCHAR(255) DEFAULT NULL, type3_biere VARCHAR(255) DEFAULT NULL, profil_biere VARCHAR(255) DEFAULT NULL, couleur_biere VARCHAR(255) DEFAULT NULL, fabricant_biere VARCHAR(255) DEFAULT NULL, conditionnement VARCHAR(255) NOT NULL, origine_biere VARCHAR(255) NOT NULL, description_biere LONGTEXT DEFAULT NULL, ingredients_biere VARCHAR(255) DEFAULT NULL, consigne_biere TINYINT(1) NOT NULL, bio_biere TINYINT(1) NOT NULL, promo_biere TINYINT(1) NOT NULL, sans_alc_biere TINYINT(1) NOT NULL, sgluten_biere TINYINT(1) NOT NULL, actif TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bieres');
    }
}
