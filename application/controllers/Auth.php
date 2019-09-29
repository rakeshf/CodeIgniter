<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library(['google', 'facebook']);
		$this->data['page_title'] = 'Auth pages';
	}

	public function login()
	{
		$this->load->helper(['form', 'chorlogin_helper']);
		$this->load->library('form_validation');
		$this->data['google_login_url'] = $this->google->get_login_url();
		$this->data['facebook_login_url'] = $this->facebook->login_url();
		$config = login_validation();
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->data['module'] = 'themes/default/auth';
			$this->data['page'] = 'login';
		} else {
			$this->data['module'] = 'themes/default';
			$this->data['page'] = 'error_403';
		}
		$this->load->view('themes/default/layout', $this->data);
	}

	public function access_denied()
	{
		$this->data['module'] = 'themes/default/auth';
		$this->data['page'] = 'error_403';
		$this->load->view('themes/default/layout', $this->data);
	}
}
