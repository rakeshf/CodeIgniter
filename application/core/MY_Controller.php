<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  protected $data = [];

  function __construct()
  {
    parent::__construct();
    $this->load->library(['google', 'facebook', 'acl']);
    $this->load->helper(['assets_helper', 'url']);
    $this->load->config('assets');
    $this->lang->load(['form_validation', 'chorbazaar'], 'english');
    // custom paging configuration
		$this->load->helper('pagination_helper');
    $this->pagination_config = pagination_config();
    $this->data['plugins_dir'] = $this->config->item('plugins_dir');
		$this->data['dist_dir'] = $this->config->item('dist_dir');
		$this->data['canonical'] = null;
  }
}
