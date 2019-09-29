<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Locations_Controller extends MY_Controller
{
	protected $redis_client;

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(['pagination','predis']);
		$this->load->model('locations_model', 'locations');
		$this->data['admin_page_title'] = 'Locations';
		$this->redis_client = $this->predis->getClient();
		$this->redis_client->select(10);
	}

	public function index()
	{
		// paging configuration
		$this->pagination_config['base_url'] = '/admin/locations/';
		$this->pagination_config['total_rows'] = $this->locations->get_count();
		$this->pagination_config['uri_segment'] = 3;
		$this->pagination_config['per_page'] = 10;
		$this->pagination->initialize($this->pagination_config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$cache_key = 'locations-'.$this->pagination_config["per_page"] .'-'. $page;
		if(!$results = $this->redis_client->get($cache_key))
		{
			$results = $this->locations->get_locations_list($this->pagination_config["per_page"], $page);
			$this->redis_client->set($cache_key, json_encode($results));
			$this->redis_client->expire($cache_key, 3600);
		}
		$this->data['results'] = json_decode($results);
		$this->data['pager'] = $this->pagination->create_links();
		$this->data['module'] = 'themes/admin/admin';
		$this->data['page'] = 'locations';
		$this->data['admin_card_title'] = 'List Locations';
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function add_location()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('latitude', '<strong>Latitude</strong>', 'required');
		$this->form_validation->set_rules('longitude', '<strong>Longitude</strong>', 'required');
		$this->data['admin_page_title'] = 'Add Locations';
		$this->data['form_path'] = 'admin/locations/add';
		$this->data['form_data'] = [
			'name' => '',
			'latitude' => '',
			'longitude' => '',
			'parent_id' => '',
			'is_active' => 0
		];
		if ($this->form_validation->run() == FALSE) {
			$this->data['module'] = 'themes/admin/admin';
			$this->data['page'] = 'add_location';
			$this->data['locations'] = $this->locations->get_locations();
		} else {
			$is_active = $this->input->post('is_active');
			$location_add = [
				'name' => $this->input->post('name'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'parent_id' => $this->input->post('parent'),
				'is_active' => isset($is_active) ? $is_active : 0
			];
			if ($this->locations->save($location_add)) {
				redirect('/admin/locations', 'refresh');
			}
		}
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function edit_location($id)
	{
		$loation_edit = $this->locations->get_location_by_id($id);
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('latitude', '<strong>Latitude</strong>', 'required');
		$this->form_validation->set_rules('longitude', '<strong>Longitude</strong>', 'required');
		$this->data['admin_page_title'] = 'Add Locations';
		$this->data['form_path'] = 'admin/locations/' . $id . '/edit';
		$this->data['form_data'] = $loation_edit[0];
		if ($this->form_validation->run() == FALSE) {
			$this->data['module'] = 'themes/admin/admin';
			$this->data['page'] = 'add_location';
			$this->data['locations'] = $this->locations->get_locations();
		} else {
			$is_active = $this->input->post('is_active');
			$location_add = [
				'name' => $this->input->post('name'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'parent_id' => $this->input->post('parent'),
				'is_active' => isset($is_active) ? $is_active : 0
			];
			if ($this->locations->update($id, $location_add)) {
				redirect('/admin/locations', 'refresh');
			}
		}
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function active_location($id)
	{
		if ($this->locations->in_active($id, 1))
		{
			redirect('/admin/locations', 'refresh');
		}	
	}

	public function inactive_location($id)
	{
		if ($this->locations->in_active($id, 0))
		{
			redirect('/admin/locations', 'refresh');
		}	
	}

	public function delete_location($id)
	{
		if ($this->locations->delete($id))
		{
			redirect('/admin/locations', 'refresh');
		}	
	}
}
