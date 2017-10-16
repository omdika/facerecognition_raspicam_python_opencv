<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'login/index';
$route['404_override'] = '';

/*admin*/

$route['admin'] = 'login/index';
$route['admin/signup'] = 'login/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'login/index';
$route['admin/logout'] = 'login/logout';
$route['admin/login/validate_credentials'] = 'login/validate_credentials';
$route['admin/login/create_member'] = 'login/create_member';

$route['admin/users'] = 'users_admin/index';
$route['admin/users/add'] = 'users_admin/add';
$route['admin/users/update'] = 'users_admin/update';
$route['admin/users/update/(:any)'] = 'users_admin/update/$1';
$route['admin/users/delete/(:any)'] = 'users_admin/delete/$1';
$route['admin/users/(:any)'] = 'users/index/$1'; //$1 = page number
$route['admin/users/del/(:any)'] = 'users_admin/del/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */