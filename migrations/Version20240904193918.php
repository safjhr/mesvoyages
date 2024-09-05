<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240904193918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE environnement_environnement (environnement_source INT NOT NULL, environnement_target INT NOT NULL, INDEX IDX_E584511247DF5DB9 (environnement_source), INDEX IDX_E58451125E3A0D36 (environnement_target), PRIMARY KEY(environnement_source, environnement_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE environnement_environnement ADD CONSTRAINT FK_E584511247DF5DB9 FOREIGN KEY (environnement_source) REFERENCES environnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE environnement_environnement ADD CONSTRAINT FK_E58451125E3A0D36 FOREIGN KEY (environnement_target) REFERENCES environnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE environnement ADD environnement VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE environnement_environnement DROP FOREIGN KEY FK_E584511247DF5DB9');
        $this->addSql('ALTER TABLE environnement_environnement DROP FOREIGN KEY FK_E58451125E3A0D36');
        $this->addSql('DROP TABLE environnement_environnement');
        $this->addSql('ALTER TABLE environnement DROP environnement');
    }
}
