<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325084554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur_secondaire (id INT AUTO_INCREMENT NOT NULL, utili_id CHAR(4) NOT NULL, la_fichefrais_id INT NOT NULL, niveau INT NOT NULL, INDEX IDX_43239A8935A2D4D0 (utili_id), INDEX IDX_43239A8924EE659B (la_fichefrais_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_secondaire ADD CONSTRAINT FK_43239A8935A2D4D0 FOREIGN KEY (utili_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE utilisateur_secondaire ADD CONSTRAINT FK_43239A8924EE659B FOREIGN KEY (la_fichefrais_id) REFERENCES fichefrais (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utilisateur_secondaire');
    }
}
