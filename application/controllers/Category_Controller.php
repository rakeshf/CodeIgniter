<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('category_model', 'category');
		$this->data['admin_page_title'] = 'Category';
	}

	public function index()
	{
		$this->data['admin_card_title'] = 'Category List';
		// paging configuration
		$this->pagination_config['base_url'] = '/admin/locations/';
		$this->pagination_config['total_rows'] = $this->category->get_count();
		$this->pagination_config['uri_segment'] = 3;
		$this->pagination_config['per_page'] = 10;
		$this->pagination->initialize($this->pagination_config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['results'] = $this->category->get_category_list($this->pagination_config["per_page"], $page);
		$this->data['pager'] = $this->pagination->create_links();
		$this->data['module'] = 'themes/admin/admin';
		$this->data['page'] = 'category';	
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function add_category()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('latitude', '<strong>Latitude</strong>', 'required');
		$this->form_validation->set_rules('longitude', '<strong>Longitude</strong>', 'required');

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
			if ($this->locations->save_location($location_add)) {
				redirect('/admin/locations', 'refresh');
			}
		}
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function edit_category($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', '<strong>Name</strong>', 'required');
		$this->form_validation->set_rules('latitude', '<strong>Latitude</strong>', 'required');
		$this->form_validation->set_rules('longitude', '<strong>Longitude</strong>', 'required');

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
			if ($this->locations->save_location($location_add)) {
				redirect('/admin/locations', 'refresh');
			}
		}
		$this->load->view('themes/admin/layout', $this->data);
	}
}
