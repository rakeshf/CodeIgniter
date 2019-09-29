<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acl
{
  protected $CI;

  protected $userId = NULL;

  protected $userRoleId = NULL;

  protected $pageUrl = NULL;

  protected $guestPages = [
    'auth/login',
    'Admin_Controller/login',
    'auth/profile',
    'auth/access_denied',
    'welcome/index',
    'Admin_Controller/add_resources'
  ];

  /**
   * Constructor
   *
   * @param array $config            
   */
  public function __construct($config = array())
  {
    $this->CI = &get_instance();
    // Load Session library
    $this->CI->load->library('session');
    // Load ACL model
    $this->CI->load->model('users/permissions_model', 'permissions');
  }

  /**
   * Check is controller/method has access for role
   *
   * @access public
   * 
   * @return bool
   */
  public function hasAccess()
  {  
    $key = 0;
    if ($this->getUserId()) {
      $permissions = $this->CI->permissions->getUserAppPermissions($this->getUserRoleId());
      $hasPermissions = $this->getHasPermissions($permissions);
      if (count($hasPermissions) > 0) {
        $currentPermission = $this->CI->uri->rsegment(1) . '/' . $this->CI->uri->rsegment(2);
        if (in_array($currentPermission, $hasPermissions)) {
          return TRUE;
        }
      }
    }
    return FALSE;
  }

  public function getHasPermissions($permissions)
  {
    $hasPermissions = [];
    foreach($permissions as $values)
    {
      $hasPermissions[$values['id']] = $values['controller'] . '/' . $values['action'];
    }
    return $hasPermissions;
  }

  /**
   * Return the value of user id from the session.
   * Returns 0 if not logged in
   *
   * @access private
   * @return int
   */
  private function getUserId()
  {
    if ($this->userId == NULL) {
      $this->userId = $this->CI->session->userdata('user_id');
      if ($this->userId === FALSE) {
        $this->userId = NULL;
      }
    }
    return $this->userId;
  }

  /**
   * Return user role
   *
   * @return int
   */
  private function getUserRoleId()
  {
    if ($this->userRoleId == NULL) {
      // Set the role
      $this->userRoleId = $this->CI->session->userdata('role_id');
      if (!$this->userRoleId) {
        $this->userRoleId = 0;
      }
    }
    return $this->userRoleId;
  }

  public function getGuestPages()
  {
    return $this->guestPages;
  }
}