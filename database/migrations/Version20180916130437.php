<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20180916130437 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, machine_id INT DEFAULT NULL, datetime DATETIME NOT NULL, amount INT NOT NULL, INDEX IDX_EAA81A4CF6B75B26 (machine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machines (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT FK_EAA81A4CF6B75B26 FOREIGN KEY (machine_id) REFERENCES machines (id)');

        $this->addSql('INSERT INTO machines (`name`) VALUES ("VASK 1")');
        $this->addSql('INSERT INTO machines (`name`) VALUES ("VASK 2")');
        $this->addSql('INSERT INTO machines (`name`) VALUES ("VASK 3")');
        $this->addSql('INSERT INTO machines (`name`) VALUES ("TØR 4")');
        $this->addSql('INSERT INTO machines (`name`) VALUES ("TØR 5")');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY FK_EAA81A4CF6B75B26');
        $this->addSql('DROP TABLE transactions');
        $this->addSql('DROP TABLE machines');
    }
}
