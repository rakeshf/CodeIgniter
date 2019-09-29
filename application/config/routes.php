<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// User login and other pages
$route['default_controller'] = 'welcome';
$route['login'] = 'auth/login';
$route['profile'] = 'auth/profile';
$route['auth/access-denied'] = 'auth/access_denied';
// Admin pages
$route['admin/login'] = 'Admin_Controller/login';
$route['admin/dashboard'] = 'Admin_Controller/dashboard';
$route['admin/dashboard/(:num)'] = 'Admin_Controller/dashboard/$1';
$route['admin/resources'] = 'Admin_Controller/resources';
$route['admin/resources/(:num)'] = 'Admin_Controller/resources/$1';
$route['admin/resources/add'] = 'Admin_Controller/add_resources';


// CURD for location
$route['admin/locations'] = 'Locations_Controller/index';
$route['admin/locations/(:num)'] = 'Locations_Controller/index/$1';
$route['admin/locations/add'] = 'Locations_Controller/add_location';
$route['admin/locations/(:num)/edit'] = 'Locations_Controller/edit_location/$1';
$route['admin/locations/(:num)/delete'] = 'Locations_Controller/delete_location/$1';
$route['admin/locations/(:num)/active'] = 'Locations_Controller/active_location/$1';
$route['admin/locations/(:num)/inactive'] = 'Locations_Controller/inactive_location/$1';
// CURD for category
$route['admin/category'] = 'Category_Controller/index';
$route['admin/category/(:num)'] = 'Category_Controller/index/$1';
$route['admin/category/(:num)'] = 'Category_Controller/index/$1';
$route['admin/category/add'] = 'Category_Controller/add_category';
$route['admin/category/(:num)/edit'] = 'Category_Controller/edit_category/$1';
$route['admin/category/(:num)/delete'] = 'Category_Controller/delete_category/$1';
$route['admin/category/(:num)/active'] = 'Category_Controller/active_category/$1';
// Other settings
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;