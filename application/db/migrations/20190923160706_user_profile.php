<?php

use Phinx\Migration\AbstractMigration;

class UserProfile extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
      $user_profile = $this->table('user_profile');
      $user_profile->addColumn('first_name', 'string', ['limit' => 30])
				->addColumn('last_name', 'string', ['limit' => 30, 'null' => true])
				->addColumn('mobile', 'string', ['limit' => 20, 'null' => false, 'default' => 0])
				->addColumn('location_id', 'integer', ['null' => true, 'default' => 0])
				->addColumn('pincode', 'string', ['limit' => 20, 'default' => 0])
				->addColumn('latitude', 'string', ['limit' => 30, 'default' => 0])
				->addColumn('longitude', 'string', ['limit' => 30, 'default' => 0])
        ->addColumn('created', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated', 'datetime', ['null' => true])
        ->create();
    }
}
