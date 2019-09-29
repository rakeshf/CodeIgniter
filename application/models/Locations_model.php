<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Locations_model extends CI_Model
{

	protected $table = 'locations';

	public function get_locations_list($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	public function get_locations()
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

	public function get_location_by_id($id = null)
	{
		$data = [];
		if($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get($this->table);
			$data = $query->result_array();
		}
		return $data;
	}

	public function save($data)
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

	public function update($id, $data)
	{
		try
		{
			$this->db->where('id', $id);
			$this->db->set('updated', 'NOW()', FALSE);
			return $this->db->update($this->table, $data);
		}
		catch (Exception $e)
		{
			log_message('error: ', $e->getMessage());
			return;
		}
	}

	public function delete($id)
	{
		try
		{
			return $this->db->delete($this->table, array('id' => $id));
		}
		catch (Exception $e)
		{
			log_message('error: ', $e->getMessage());
			return;
		}
	}

	public function in_active($id, $is_active)
	{
		try
		{
			$this->db->where('id', $id);
			$this->db->set('updated', 'NOW()', FALSE);
			return $this->db->update($this->table, ['is_active' => $is_active]);
		}
		catch (Exception $e)
		{
			log_message('error: ', $e->getMessage());
			return;
		}
	}
}
