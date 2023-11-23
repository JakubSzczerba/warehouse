<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231122190415 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE price_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE price (id INT NOT NULL, price_id VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, price_net_after_discount VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE price_id_seq CASCADE');
        $this->addSql('DROP TABLE price');
    }
}
