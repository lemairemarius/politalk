<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004142054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE admin_id_seq CASCADE');
        $this->addSql('ALTER TABLE "user" ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD fname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD birth_d DATE NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD mail VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD adress VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD city VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD postal_c VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE admin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE "user" DROP name');
        $this->addSql('ALTER TABLE "user" DROP fname');
        $this->addSql('ALTER TABLE "user" DROP birth_d');
        $this->addSql('ALTER TABLE "user" DROP mail');
        $this->addSql('ALTER TABLE "user" DROP adress');
        $this->addSql('ALTER TABLE "user" DROP city');
        $this->addSql('ALTER TABLE "user" DROP postal_c');
    }
}
