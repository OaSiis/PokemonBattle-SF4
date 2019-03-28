<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190324193331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE TABLE heal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, power SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dresseur_pokemon (id INT AUTO_INCREMENT NOT NULL, dresseurs_id INT NOT NULL, pokemons_id INT NOT NULL, health INT NOT NULL, level INT NOT NULL, INDEX IDX_6F857270CB0983B2 (dresseurs_id), INDEX IDX_6F857270263F4792 (pokemons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dresseur_pokemon ADD CONSTRAINT FK_6F857270CB0983B2 FOREIGN KEY (dresseurs_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE dresseur_pokemon ADD CONSTRAINT FK_6F857270263F4792 FOREIGN KEY (pokemons_id) REFERENCES pokemon (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dresseur_pokemon DROP FOREIGN KEY FK_6F857270263F4792');
        $this->addSql('ALTER TABLE dresseur_pokemon DROP FOREIGN KEY FK_6F857270CB0983B2');
        $this->addSql('DROP TABLE heal');
        $this->addSql('DROP TABLE dresseur_pokemon');
    }
}
