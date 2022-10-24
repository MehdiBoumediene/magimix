<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004121601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE files (id INT AUTO_INCREMENT NOT NULL, produits_id INT DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, INDEX IDX_6354059CD11A2CF (produits_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_6354059CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE categories ADD logo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668F98F144A FOREIGN KEY (logo_id) REFERENCES files (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3AF34668F98F144A ON categories (logo_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668F98F144A');
        $this->addSql('ALTER TABLE files DROP FOREIGN KEY FK_6354059CD11A2CF');
        $this->addSql('DROP TABLE files');
        $this->addSql('DROP INDEX UNIQ_3AF34668F98F144A ON categories');
        $this->addSql('ALTER TABLE categories DROP logo_id');
    }
}
