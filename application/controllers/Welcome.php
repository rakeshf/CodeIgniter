<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();
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
		$ads = [
			[
				'title' => 'Iphone 6s for sale',
				'details' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.'
			],
			[
				'title' => 'Iphone 6s for sale',
				'details' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.'
			],
			[
				'title' => 'Iphone 6s for sale',
				'details' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.'
			],	
		];
		$this->data['canonical'] = null;
		$this->data['module'] = 'themes/default/welcome';
		$this->data['page'] = 'index';
		$this->data['ads'] = $ads;
		$this->load->view('themes/default/layout', $this->data);
	}

	public function login()
	{
		$google_data = $this->google->validate();
		print_r($google_data);die;
	}
}
