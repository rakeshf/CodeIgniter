<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{

	protected $data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->library(['google', 'facebook']);
		$this->load->helper('url');
		$this->load->config('assets');
		$this->data['google_login_url'] = $this->google->get_login_url();
		$this->data['facebook_login_url'] = $this->facebook->login_url();
		$this->data['plugins_dir'] = $this->config->item('plugins_dir');
		$this->data['dist_dir'] = $this->config->item('dist_dir');
		$this->data['canonical'] = null;
		$this->data['admin_page_title'] = 'Login';
	}

	public function login()
	{
		$this->load->helper(['form', 'chorlogin_helper', 'security']);
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('users/user', 'user');
		$config = login_validation();
		$this->form_validation->set_rules($config);
		$form_data = [];
		$data['canonical'] = null;
		if ($this->session->userdata('user_id')) {
			return redirect('admin/locations');
		}
		if ($this->form_validation->run() == FALSE) {
			$this->data['module'] = 'themes/admin/admin';
			$this->data['page'] = 'login';
		} else {
			$form_data = [
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			];
			if ($user_data = $this->user->checkUserExist($form_data)) {
				$this->session->set_userdata($user_data);
				return redirect('admin/locations');
			} else {
				$this->form_validation->set_message('check_database', 'Invalid username or password');
				$this->data['error'] = 'Incorrect username/password';
				$this->data['module'] = 'themes/admin/admin';
				$this->data['page'] = 'login';
			}
		}
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function dashboard()
	{
		$this->load->model('users/user', 'users');
		$this->load->library('pagination');
		// custom paging configuration
		$this->load->helper('pagination_helper');
		$config = pagination_config();
		$config['base_url'] = '/admin/dashboard/';
		$config['total_rows'] = $this->users->get_count();
		$config['uri_segment'] = 3;
		$config['per_page'] = 1;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['results'] = $this->users->get_user_list($config["per_page"], $page);
		$this->data['pager'] = $this->pagination->create_links();
		$this->data['module'] = 'themes/admin/admin';
		$this->data['page'] = 'dashboard';
		$this->data['admin_page_title'] = 'Dashboard';
		$this->data['admin_card_title'] = 'users list';
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function add_resources()
	{
		$this->load->model('users/user', 'users');
		$this->data['module'] = 'themes/admin/admin';
		$this->data['page'] = 'dashboard';
		$this->data['admin_page_title'] = 'Dashboard';
		$this->data['admin_card_title'] = 'users list';
		$this->load->view('themes/admin/layout', $this->data);

	}
}
