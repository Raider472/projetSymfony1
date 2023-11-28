<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128184615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE widget (id INT AUTO_INCREMENT NOT NULL, vetement_id INT NOT NULL, lien VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_85F91ED0969D8B67 (vetement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE widget ADD CONSTRAINT FK_85F91ED0969D8B67 FOREIGN KEY (vetement_id) REFERENCES vetement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE widget DROP FOREIGN KEY FK_85F91ED0969D8B67');
        $this->addSql('DROP TABLE widget');
    }
}
