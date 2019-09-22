<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

	protected $data = [];

	function __construct()
	{
		parent::__construct();
		$this->load->library(['google', 'facebook']);
		$this->load->config('assets');
		$this->data['google_login_url'] = $this->google->get_login_url();
		$this->data['facebook_login_url'] = $this->facebook->login_url();
		$this->data['plugins_dir'] = $this->config->item('plugins_dir');
		$this->data['dist_dir'] = $this->config->item('dist_dir');
		$this->data['canonical'] = null;
	}

	public function login()
	{
		$this->load->helper(['form', 'chorlogin_helper', 'security']);
		$this->load->library('form_validation');
		$config = login_validation();
		$this->form_validation->set_rules($config);
		$form_data = [];
		$data['canonical'] = null;
		if ($this->form_validation->run() == FALSE) {
			$this->data['module'] = 'themes/admin/admin';
			$this->data['page'] = 'login';
		} else {
			redirect('admin/dashboard');
		}
		$this->load->view('themes/admin/layout', $this->data);
	}

	public function dashboard()
	{
		$this->data['module'] = 'themes/admin/admin';
		$this->data['page'] = 'dashboard';
		$this->load->view('themes/admin/layout', $this->data);
	}
}
