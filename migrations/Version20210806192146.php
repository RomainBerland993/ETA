<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806192146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation entité Etablissement avec Type et Adress';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement ADD adress_id INT NOT NULL, ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592C8486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id)');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592CC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_20FD592C8486F9AC ON etablissement (adress_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_20FD592CC54C8C93 ON etablissement (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592C8486F9AC');
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592CC54C8C93');
        $this->addSql('DROP INDEX UNIQ_20FD592C8486F9AC ON etablissement');
        $this->addSql('DROP INDEX UNIQ_20FD592CC54C8C93 ON etablissement');
        $this->addSql('ALTER TABLE etablissement DROP adress_id, DROP type_id');
    }
}
