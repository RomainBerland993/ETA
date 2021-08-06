<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806193633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de l\'entité Etablissement';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592C8486F9AC');
        $this->addSql('DROP INDEX UNIQ_20FD592C8486F9AC ON etablissement');
        $this->addSql('ALTER TABLE etablissement ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE adress_id adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592C4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adress (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_20FD592C4DE7DC5C ON etablissement (adresse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592C4DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_20FD592C4DE7DC5C ON etablissement');
        $this->addSql('ALTER TABLE etablissement DROP created_at, DROP updated_at, CHANGE adresse_id adress_id INT NOT NULL');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592C8486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_20FD592C8486F9AC ON etablissement (adress_id)');
    }
}
