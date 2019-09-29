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

	public function checkUserExist($date)
	{
		$user_data = [];
		$this->db->where('email', $date['email']);
		$query = $this->db->get('users');
		$result = $query->row();
		if($query->num_rows())
		{
			if ($result->password == $date['password'])
			{
				$user_data = [
					'email' => $result->email,
					'role_id' => 1,
					'user_id' => 1,
					'logged_in' => TRUE
				];
			}
		}
		return $user_data;
	}
}
