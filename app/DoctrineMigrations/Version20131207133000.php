<?php

namespace Application\Migrations;

use Doctrine\Bundle\MigrationsBundle\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20131207133000 extends AbstractMigration
{

  /**
   * {@inheritdoc}
   */
  public function up(Schema $schema)
  {
    $this->addSql("CREATE TABLE session (session_id varchar(255) NOT NULL, session_value text NOT NULL, session_time int(11) NOT NULL, PRIMARY KEY (session_id))");
  }

  /**
   * {@inheritdoc}
   */
  public function down(Schema $schema)
  {
    $this->addSql("DROP TABLE IF EXISTS session");
  }

}
