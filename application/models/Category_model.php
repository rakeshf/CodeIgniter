<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{

	protected $table = 'category';

	public function get_category_list($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	public function get_categories()
	{
		$options = [];
		$query = $this->db->get($this->table);
		$result = $query->result();
		foreach($result as $location)
		{
			$options[$location->id] = $location->name;
		}
		return $options;
	}

	public function save_category($data)
	{
		try
		{
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}
		catch (Exception $e)
		{
			log_message('error: ', $e->getMessage());
			return;
		}
	}
}
