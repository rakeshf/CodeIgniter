<?php

use Phinx\Migration\AbstractMigration;

class Locations extends AbstractMigration
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
      $locations = $this->table('locations');
      $locations->addColumn('name', 'string', ['limit' => 100])
        ->addColumn('parent_id', 'integer', ['null' => true, 'default' => 0])
        ->addColumn('latitude', 'string', ['limit' => 30])
				->addColumn('longitude', 'string', ['limit' => 30])
				->addColumn('is_active', 'boolean', ['null' => false, 'signed' => false, 'default' => 1])
        ->addColumn('created', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
        ->addColumn('updated', 'datetime', ['null' => true])
        ->create();
    }
}
