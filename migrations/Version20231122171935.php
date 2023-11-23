<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231122171935 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE product (id INT NOT NULL, product_id VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, reference_number VARCHAR(255) NOT NULL, ean VARCHAR(255) NOT NULL, can_be_returned BOOLEAN NOT NULL, producer_name VARCHAR(255) NOT NULL, category VARCHAR(1000) NOT NULL, is_wire BOOLEAN NOT NULL, shipping VARCHAR(255) NOT NULL, package_size VARCHAR(255) NOT NULL, available VARCHAR(255) NOT NULL, logistic_height VARCHAR(255) NOT NULL, logistic_width VARCHAR(255) NOT NULL, logistic_length VARCHAR(255) NOT NULL, logistic_weight VARCHAR(255) NOT NULL, is_vendor BOOLEAN NOT NULL, available_in_parcel_locker BOOLEAN NOT NULL, default_image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE product_id_seq CASCADE');
        $this->addSql('DROP TABLE product');
    }
}
