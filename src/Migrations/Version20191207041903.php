<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191207041903 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transaction (id INT AUTO_INCREMENT NOT NULL, relation_id INT NOT NULL, email VARCHAR(60) NOT NULL, username VARCHAR(60) NOT NULL, motivation LONGTEXT NOT NULL, date_selected VARCHAR(60) NOT NULL, state VARCHAR(60) NOT NULL, INDEX IDX_723705D13256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eco_level (id INT AUTO_INCREMENT NOT NULL, level DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(60) NOT NULL, address LONGTEXT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE host_place (id INT AUTO_INCREMENT NOT NULL, activity_id INT NOT NULL, photo_id INT DEFAULT NULL, address LONGTEXT NOT NULL, email VARCHAR(80) NOT NULL, INDEX IDX_D77F1E3E81C06096 (activity_id), UNIQUE INDEX UNIQ_D77F1E3E7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE host_placement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, lat DOUBLE PRECISION NOT NULL, lng DOUBLE PRECISION NOT NULL, color VARCHAR(60) NOT NULL, url VARCHAR(255) NOT NULL, descp LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D13256915B FOREIGN KEY (relation_id) REFERENCES host_place (id)');
        $this->addSql('ALTER TABLE host_place ADD CONSTRAINT FK_D77F1E3E81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE host_place ADD CONSTRAINT FK_D77F1E3E7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE host_place DROP FOREIGN KEY FK_D77F1E3E81C06096');
        $this->addSql('ALTER TABLE host_place DROP FOREIGN KEY FK_D77F1E3E7E9E4C8C');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D13256915B');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE transaction');
        $this->addSql('DROP TABLE eco_level');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE host_place');
        $this->addSql('DROP TABLE host_placement');
    }
}
