<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('google');
	}

	public function profile()
	{
		$google_data = $this->google->validate();
		print_r($google_data);die;
	}
}
