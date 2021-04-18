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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['signin'] = 'main/signin';
$route['processSignIn'] = 'main/processSignIn';
$route['register'] = 'main/register';
$route['processRegister'] = 'main/processRegister';

$route['users/new'] = 'dashboard/addNewUser';
$route['users/processNewUser'] = 'dashboard/processNewUser';
$route['users/show/(:any)'] = 'dashboard/show/$1';
$route['users/edit/(:any)'] = 'dashboard/editUser/$1';
$route['edit'] = 'dashboard/edit';
$route['editUser/(:any)'] = 'dashboard/processEditUser/$1';
$route['changePassword/(:any)'] = 'dashboard/changePassword/$1';
$route['editUserProfile/(:any)'] = 'dashboard/processEditUserProfile/$1';
$route['changePasswordProfile/(:any)'] = 'dashboard/changePasswordProfile/$1';
$route['changeProfileDescription/(:any)'] = 'dashboard/changeProfileDescription/$1';

$route['users/delete/(:any)'] = 'dashboard/deleteUser/$1';
$route['delete/(:any)'] = 'dashboard/processDeleteUser/$1';

$route['postMessage/(:any)/(:any)/(:any)'] = 'messages/postMessage/$1/$2/$3';
$route['postComment/(:any)/(:any)/(:any)'] = 'messages/postComment/$1/$2/$3';

$route['logoff'] = 'main/logoff';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;