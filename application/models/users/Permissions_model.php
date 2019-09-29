<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Permissions_model extends CI_Model
{
  public function getUserAppPermissions($role_id)
	{
		$this->db->select('*');
		$this->db->from('roles as roles');
		$this->db->join('app_permissions as app_perm', 'roles.id = app_perm.role_id');
		$this->db->join('app_resources as app_src', 'app_perm.resource_id = app_src.id');
		$this->db->where('app_src.is_active', 1);  
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getPageUrl($id)
	{
		$this->db->where('id', $id); 
		$query = $this->db->get('app_resources');
		$result = $query->result();
		return $result;
	}
}