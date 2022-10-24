<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004124955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF346683DA5256D FOREIGN KEY (image_id) REFERENCES files (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3AF346683DA5256D ON categories (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF346683DA5256D');
        $this->addSql('DROP INDEX UNIQ_3AF346683DA5256D ON categories');
        $this->addSql('ALTER TABLE categories DROP image_id');
    }
}
