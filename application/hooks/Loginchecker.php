<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginchecker
{
  private $CI;

  function __construct()
  {
    $this->CI = &get_instance();

    $this->CI->load->helper('url');

    if (!isset($this->CI->session)) { // Check if session lib is loaded or not
      $this->CI->load->library('session'); // If not loaded, then load it here
    }
  }

  function loginCheck()
  {
    $controller = $this->CI->uri->rsegment(1);
    $action     = $this->CI->uri->rsegment(2);
    $arg     = $this->CI->uri->rsegment(3);
    if ($this->CI->session->userdata('user_id')) {
      // Check for ACL      
      if (!$this->CI->acl->hasAccess() && !in_array($controller . '/' . $action, $this->CI->acl->getGuestPages())) {
        return redirect('auth/access-denied');
      }
    } else {
      if (!in_array($controller . '/' . $action, $this->CI->acl->getGuestPages())) {
        return redirect('/login');
      }
    }
  }
}
