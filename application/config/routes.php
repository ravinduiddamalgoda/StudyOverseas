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
|	https://codeigniter.com/userguide3/general/routing.html
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

// $route['default_controller'] = 'auth/login';
// $route['default_controller'] = 'auth/web_login';
$route['default_controller'] = 'web/home';

// web routes 
$route['about'] = 'web/about';
$route['services'] = 'web/services';
$route['contact'] = 'web/contact';
$route['search'] = 'web/search';
$route['courses'] = 'web/courses';
$route['appointment'] = 'web/appointment';

$route['contact/submit_inquiry'] = 'ContactController/submit_inquiry';
$route['appointment/submit_appointment'] = 'Appointment/submit_appointment';


$route['admin'] = 'auth/login';
$route['auth/login'] = 'auth/login';
$route['auth/login_process'] = 'auth/login_process';
$route['auth/register'] = 'auth/register';
$route['auth/register_process'] = 'auth/register_process';
$route['auth/logout'] = 'auth/logout';

$route['admin/dashboard'] = 'admin/dashboard';
$route['web/user/dashboard'] = 'user/dashboard';

$route['auth/forgot_password'] = 'auth/forgot_password';
$route['auth/send_otp'] = 'auth/send_otp';
$route['auth/verify_otp'] = 'auth/verify_otp';
$route['auth/validate_otp'] = 'auth/validate_otp';
$route['auth/reset_password'] = 'auth/reset_password';
$route['auth/update_password'] = 'auth/update_password';

$route['admin/user'] = 'user/user_list';
$route['admin/view_appointments'] = 'admin/view_appointments';
$route['appointment/delete/(:num)'] = 'appointment/delete/$1';
$route['appointment/view/(:num)'] = 'appointment/view/$1';
$route['appointment/edit/(:num)'] = 'appointment/edit/$1';
$route['appointment/update/(:num)'] = 'appointment/update/$1';



$route['admin/view_inquiries'] = 'admin/view_inquiries';
$route['admin/delete_inquiry/(:num)'] = 'admin/delete_inquiry/$1';// Route to delete an inquiry by ID
$route['admin/view_inquiry/(:num)'] = 'admin/view_inquiry/$1'; // Route to view an inquiry by ID


$route['admin/view_courses'] = 'admin/view_courses';
$route['admin/view_countries'] = "admin/view_countries";
$route['admin/view_employees'] = "admin/view_employees";

$route['admin/delete_course/(:num)'] = 'admin/delete_course/$1';// Route to delete a course by ID
$route['admin/view_course/(:num)'] = 'admin/view_course/$1'; // Route to view a course by ID
$route['admin/edit_course/(:num)'] = 'admin/edit_course/$1'; // Route to edit a course by ID

$route['admin/delete_country/(:num)'] = 'admin/delete_country/$1';// Route to delete a country by ID
$route['admin/view_country/(:num)'] = 'admin/view_country/$1'; // Route to view a country by ID
$route['admin/edit_country/(:num)'] = 'admin/edit_country/$1'; // Route to edit a country by ID


$route['user/view_courses'] = 'admin/view_courses';


$route['user/appointment'] = 'user/appointment';

// $route['admin/user/create'] = 'admin/user/create';
// $route['admin/user/store'] = 'admin/user/store';
// $route['admin/user/edit/(:num)'] = 'admin/user/edit/$1';
// $route['admin/user/update/(:num)'] = 'admin/user/update/$1';
// $route['admin/user/delete/(:num)'] = 'admin/user/delete/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// $route['default_controller'] = 'welcome';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;

// $route['customers'] = 'customer/index';
// $route['customer/create'] = 'customer/create';
// $route['customer/store'] = 'customer/store';
// $route['customer/edit/(:num)'] = 'customer/edit/$1';
// $route['customer/update/(:num)'] = 'customer/update/$1';
// $route['customer/delete/(:num)'] = 'customer/delete/$1';
