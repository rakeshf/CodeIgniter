<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'] = function () {
  $dotenv = Dotenv\Dotenv::create(APPPATH);
  $dotenv->load();
};
/*
* Login check
*/
$hook['post_controller_constructor'][] = [
  'class'    => 'Loginchecker',
  'function' => 'loginCheck',
  'filename' => 'Loginchecker.php',
  'filepath' => 'hooks',
  'params'   => []
];
