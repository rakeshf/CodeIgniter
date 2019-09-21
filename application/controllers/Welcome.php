<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library(['google', 'facebook']);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper(['form', 'url', 'chorlogin_helper']);
		$this->load->library('form_validation');
		$data['google_login_url'] = $this->google->get_login_url();
		$data['facebook_login_url'] = $this->facebook->login_url();
		$config = login_validation();
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('chorbazaar_login', $data);
		}
		else
		{
			$this->load->view('chorbazaar_denied');
		}
		
		$this->load->view('welcome_message');
	}

	public function profile()
	{
		$google_data = $this->google->validate();
		print_r($google_data);die;
	}
}
