<?php

use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
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
		$users = $this->table('users');
		$users
			->addColumn('username', 'string', ['limit' => 50, 'null' => false])
			->addColumn('email', 'string', ['limit' => 100, 'null' => false])
			->addColumn('created', 'timestamp', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
			->addColumn('is_active', 'boolean', ['null' => false, 'signed' => false, 'default' => 0]);
			
		$users->addIndex('email', ['type' => 'fulltext']);

		$users->create();
	}
}
