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
/*
$route['default_controller'] = "welcome";
$route['404_override'] = '';*/
$route['company'] = 'company';

$route['company/mysetting'] = 'company/mysetting';

$route['moments'] = 'moments';
$route['search'] = 'search';

$route['resume/deliverresume'] = 'resume/deliverresume';
$route['resume/deliverresume/(:any)'] = 'resume/deliverresume/$1';
$route['resume/updatebasic'] = 'resume/updatebasic';
$route['resume/post'] = 'resume/post';
$route['resume/update_edu'] = 'resume/update_edu';
$route['resume/create'] = 'resume/create';
$route['resume/create/(:any)'] = 'resume/create/(:any)';
$route['resume'] = 'resume';
$route['resume/addlang'] = 'resume/addlang';
$route['resume/addschoolwork'] = 'resume/addschoolwork';
$route['resume/addsocial'] = 'resume/addsocial';
$route['resume/addproject'] = 'resume/addproject';
$route['resume/addaward'] = 'resume/addaward';
$route['resume/addetc'] = 'resume/addetc';
$route['resume/addattach'] = 'resume/addattach';
$route['resume/deleteByResumeID/(:any)'] = 'resume/deleteByResumeID/$1';
$route['resume/updatebasicByResumeID/(:any)'] = 'resume/updatebasicByResumeID/$1';
$route['resume/updatepicture/(:any)'] = 'resume/updatepicture/$1';

$route['resume/updateattach'] = 'resume/updateattach';
$route['resume/updateattach/(:any)'] = 'resume/updateattach/$1';

$route['resume/createfromandroid/(:any)'] = 'resume/createfromandroid/$1';
$route['resume/createresume/(:any)'] = 'resume/createresume/$1';
$route['resume/getresumeidlist/(:any)'] = 'resume/getresumeidlist/$1';

$route['preview/getpreviewfromandroid/(:any)'] = 'preview/getpreviewfromandroid/$1';

$route['upload/do_upload'] = 'upload/do_upload';

$route['preview'] = 'preview';
$route['preview/lvse'] = 'preview/lvse';
$route['preview/json'] = 'preview/json';
$route['preview/getpreview'] = 'preview/getpreview';
$route['preview/getpreview/(:any)'] = 'preview/getpreview/$1';

$route['iter'] = 'iter';
$route['iter/login'] = 'iter/login';
$route['iter/regist'] = 'iter/regist';
$route['iter/login/(:any)'] = 'iter/login/$1';
$route['iter/logout'] = 'iter/logout';
$route['iter/mysetting'] = 'iter/mysetting';
$route['default_controller'] = "iter";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
