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
$route['default_controller'] = 'Web_Controller/home';

// web routes 
$route['about'] = 'Web_Controller/about';
$route['services'] = 'Web_Controller/services';
$route['contact'] = 'Web_Controller/contact';
$route['search'] = 'Web_Controller/search';
$route['courses'] = 'Web_Controller/courses';
$route['appointment'] = 'Web_Controller/appointment';

$route['contact/submit_inquiry'] = 'Contact_Controller/submit_inquiry';
$route['appointment/submit_appointment'] = 'Appointment_Controller/submit_appointment';


$route['admin'] = 'Auth_Controller/login';

$route['auth/login'] = 'Auth_Controller/login';
$route['auth/login_process'] = 'Auth_Controller/login_process';
$route['auth/register'] = 'Auth_Controller/register';
$route['auth/register_process'] = 'Auth_Controller/register_process';
$route['auth/logout'] = 'Auth_Controller/logout';
$route['auth/web_logout'] = 'Auth_Controller/logout';
$route['auth/forgot_password'] = 'Auth_Controller/forgot_password';
$route['auth/send_otp'] = 'Auth_Controller/send_otp';
$route['auth/verify_otp'] = 'Auth_Controller/verify_otp';
$route['auth/validate_otp'] = 'Auth_Controller/validate_otp';
$route['auth/reset_password'] = 'Auth_Controller/reset_password';
$route['auth/update_password'] = 'Auth_Controller/update_password';

$route['admin/dashboard'] = 'Admin_Controller/dashboard';

$route['admin/users'] = 'Admin_Controller/user_list';
$route['admin/user/add'] = 'Admin_Controller/user_create';
$route['admin/user/edit/(:num)'] = 'Admin_Controller/user_edit/$1';
$route['admin/user/update/(:num)'] = 'Admin_Controller/user_update/$1';
$route['admin/user/delete/(:num)'] = 'Admin_Controller/user_delete/$1';

$route['admin/appointments'] = 'Admin_Controller/view_appointments';
$route['admin/appointment/(:num)'] = 'Admin_Controller/view_appointment/$1';
$route['admin/appointment/edit/(:num)'] = 'Admin_Controller/edit_appointment/$1';
$route['admin/appointment/update/(:num)'] = 'Admin_Controller/update_appointment/$1';
$route['admin/appointment/delete/(:num)'] = 'Admin_Controller/delete_appointment/$1';

$route['admin/inquiries'] = 'Admin_Controller/view_inquiries';
$route['admin/inquiry/(:num)'] = 'Admin_Controller/view_inquiry/$1'; // Route to view an inquiry by ID
$route['admin/inquiry/delete/(:num)'] = 'Admin_Controller/delete_inquiry/$1';// Route to delete an inquiry by ID

$route['admin/courses'] = 'Admin_Controller/course_list';
$route['admin/course/add'] = 'Admin_Controller/course_create';
$route['admin/course/edit/(:any)'] = 'Admin_Controller/course_edit/$1'; // Route to edit a course by ID
$route['admin/course/delete/(:any)'] = 'Admin_Controller/course_delete/$1';// Route to delete a course by ID

$route['admin/countries'] = "Admin_Controller/country_list";
$route['admin/country/add'] = "Admin_Controller/country_create";
$route['admin/country/(:num)'] = 'Admin_Controller/country/$1'; // Route to view a country by ID
$route['admin/country/edit/(:num)'] = 'Admin_Controller/country_edit/$1'; // Route to edit a country by ID
$route['admin/country/delete/(:num)'] = 'Admin_Controller/country_delete/$1';// Route to delete a country by ID

$route['admin/employees'] = "Admin_Controller/employee_list";
$route['admin/employee/add'] = "Admin_Controller/employee_create";
$route['admin/employee/edit/(:num)'] = 'Admin_Controller/employee_edit/$1'; // Route to edit an employee by ID
$route['admin/employee/delete/(:num)'] = 'Admin_Controller/employee_delete/$1';// Route to delete an employee by ID

$route['user/dashboard'] = 'User_Controller/dashboard';
$route['user/appointment/add'] = 'User_Controller/new_appointment';
$route['user/appointment/view'] = 'User_Controller/view_appointment';
$route['user/update_password'] = 'User_Controller/update_password';
$route['user/get_councilor'] = 'User_Controller/get_councilor';

$route['user/application'] = 'StudentApplication_Controller/index';
$route['user/application/create'] = 'StudentApplication_Controller/create';
$route['user/application/update/(:num)'] = 'StudentApplication_Controller/update/$1';
$route['user/application/delete/(:num)'] = 'StudentApplication_Controller/delete/$1';

$route['chat/send'] = 'Chat_Controller/send_message'; // POST
$route['chat/messages/(:num)/(:num)'] = 'Chat_Controller/get_messages/$1/$2'; // GET
$route['chat/unread/(:num)'] = 'Chat_Controller/get_unread_count/$1'; // GET
$route['chat/messages/sender/(:num)'] = 'Chat_Controller/get_messages_by_sender/$1'; // GET
$route['chat/messages/receiver/(:num)'] = 'Chat_Controller/get_messages_by_receiver/$1'; // GET

// $route['admin/user/create'] = 'admin/user/create';
// $route['admin/user/store'] = 'admin/user/store';
// $route['admin/user/edit/(:num)'] = 'admin/user/edit/$1';
// $route['admin/user/update/(:num)'] = 'admin/user/update/$1';
// $route['admin/user/delete/(:num)'] = 'admin/user/delete/$1';


$route['counsellor'] = 'Counsellor_Controller/dashboard';
$route['counsellor/dashboard'] = 'Counsellor_Controller/dashboard';
$route['counsellor/chats'] = 'Counsellor_Controller/chat_list';
$route['counsellor/chat/(:num)'] = 'Counsellor_Controller/chat/$1';

$route['admissionteam'] = 'AdmissionTeam_Controller/dashboard';
$route['admissionteam/dashboard'] = 'AdmissionTeam_Controller/dashboard';

$route['it'] = 'IT_Controller/dashboard';
$route['it/dashboard'] = 'IT_Controller/dashboard';

$route['it/courses'] = 'IT_Controller/course_list';
$route['it/course/add'] = 'IT_Controller/course_create';
$route['it/course/edit/(:any)'] = 'IT_Controller/course_edit/$1';
$route['it/course/update/(:any)'] = 'IT_Controller/course_update/$1';
$route['it/course/delete/(:any)'] = 'IT_Controller/course_delete/$1';

$route['it/countries'] = 'IT_Controller/country_list';
$route['it/country/add'] = 'IT_Controller/country_create';
$route['it/country/edit/(:num)'] = 'IT_Controller/country_edit/$1';
$route['it/country/update/(:num)'] = 'IT_Controller/country_update/$1';
$route['it/country/delete/(:num)'] = 'IT_Controller/country_delete/$1';

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
