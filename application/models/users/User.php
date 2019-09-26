<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{

	protected $table = 'users';

	public function get_user_list($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_count()
	{
		return $this->db->count_all($this->table);
	}
}
