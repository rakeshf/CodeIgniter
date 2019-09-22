<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Chorbazaar Form Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Rakesh Falke
 * @link		https://codeigniter.com/user_guide/helpers/form_helper.html
 */

if (!function_exists('login_validation')) {
  function login_validation()
  {
    return 
    $config = [
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required',
        'errors' => [
          'required' => 'You must provide a %s.',
        ],
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required',
        'errors' => [
          'required' => 'You must provide a %s.',
        ],
      ],
    ];
  }
}
