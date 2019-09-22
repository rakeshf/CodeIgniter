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
    $this->lang->load(['form_validation', 'chorbazaar'], 'english');
    $this->data['canonical'] = null;
  }
}
