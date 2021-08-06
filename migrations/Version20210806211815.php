<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210806211815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de l\'entité Tournament';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tournament (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournament_users (tournament_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_D5D535F033D1A3E7 (tournament_id), INDEX IDX_D5D535F067B3B43D (users_id), PRIMARY KEY(tournament_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournament_event (tournament_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_FAF89ABE33D1A3E7 (tournament_id), INDEX IDX_FAF89ABE71F7E88B (event_id), PRIMARY KEY(tournament_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tournament_users ADD CONSTRAINT FK_D5D535F033D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournament_users ADD CONSTRAINT FK_D5D535F067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournament_event ADD CONSTRAINT FK_FAF89ABE33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournament_event ADD CONSTRAINT FK_FAF89ABE71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournament_users DROP FOREIGN KEY FK_D5D535F033D1A3E7');
        $this->addSql('ALTER TABLE tournament_event DROP FOREIGN KEY FK_FAF89ABE33D1A3E7');
        $this->addSql('DROP TABLE tournament');
        $this->addSql('DROP TABLE tournament_users');
        $this->addSql('DROP TABLE tournament_event');
    }
}
