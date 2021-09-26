<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210922071913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE test');
        $this->addSql('ALTER TABLE users ADD name VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test (id_Biere INT DEFAULT 0 NOT NULL, libelle_Biere VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, marque_Biere VARCHAR(100) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, titreAlcool_Biere NUMERIC(4, 2) NOT NULL, contenance_Biere VARCHAR(150) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, prixAchat_Biere NUMERIC(5, 2) NOT NULL, prixVente_Biere NUMERIC(5, 2) NOT NULL COMMENT \'prix d\'\'achat + marge (22%)\', prixTTC_Biere NUMERIC(5, 2) NOT NULL COMMENT \'prix de vente + TVA (20%)\', type1_Biere VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, type2_Biere VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, type3_Biere VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, profil_Biere VARCHAR(150) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, couleur_Biere VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, fabricant_Biere VARCHAR(200) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, conditionnement VARCHAR(25) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, origine_Biere VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, description_Biere VARCHAR(600) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ingredients_Biere VARCHAR(250) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, consigne_Biere TINYINT(1) NOT NULL, Bio_Biere TINYINT(1) NOT NULL, promo_Biere TINYINT(1) NOT NULL, sansAlc_Biere TINYINT(1) NOT NULL, SGluten_Biere TINYINT(1) NOT NULL, actif INT DEFAULT 1 NOT NULL, users_Id INT DEFAULT 12 NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users DROP name, DROP firstname');
    }
}
