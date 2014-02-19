<?php

namespace Application\Migrations;

use Apnet\Doctrine\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20130101000000 extends AbstractMigration
{

  /**
   * {@inheritdoc}
   */
  public function up(Schema $schema)
  {
    // $this->addSql("SELECT 1");
  }

  /**
   * {@inheritdoc}
   */
  public function down(Schema $schema)
  {
    // $this->addSql("SELECT 1");
  }

}
