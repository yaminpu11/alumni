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
$route['default_controller'] = 'c_dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['category/(:num)'] = 'c_dashboard/category/$1';
$route['details/(:num)'] = 'c_dashboard/details/$1';
$route['category'] = 'c_dashboard/category';
$route['about'] = 'c_dashboard/about';
$route['contact'] = 'c_dashboard/contact';
$route['search'] = 'c_dashboard/search';


// News 
$route['getapinewsbyblog'] = 'c_branda/load_newsbyblog';



// ==== Read Data ===== //
$route['__load_about'] = 'c_branda/load_about';
$route['__details'] = 'c_branda/load_details';
$route['__load_slide1'] = 'c_branda/load_slide1';
$route['__load_slide2'] = 'c_branda/load_slide2';
$route['__load_slide3'] = 'c_branda/load_slide3';
$route['__load_slide4'] = 'c_branda/load_slide4';
$route['__load_slide5'] = 'c_branda/load_slide5';
$route['__load_slide6'] = 'c_branda/load_slide6';

$route['__load_category'] = 'c_branda/load_category';
$route['__load_categorytop'] = 'c_branda/load_categorytop';
$route['__load_categorytop1'] = 'c_branda/load_categorytop1';
$route['__load_recent_post'] = 'c_branda/load_recentPost';
$route['__load_recent_post1'] = 'c_branda/load_recentPost1';
$route['__load_recommend'] = 'c_branda/load_recommend';
$route['__load_recommend1'] = 'c_branda/load_recommend1';
$route['__load_comment'] = 'c_branda/show_comment';
$route['__load_childcomment'] = 'c_branda/show_childcomment';
$route['__load_bycategory'] = 'c_branda/show_bycategory';
$route['__load_rata'] = 'c_branda/show_rata';


$route['__save_contact'] = 'c_branda/save_contact';
$route['__save_comment'] = 'c_branda/save_comment';
$route['__save_childcomment'] = 'c_branda/save_childcomment';
$route['__save_rating'] = 'c_branda/save_rating';

// search
$route['__details_search'] = 'c_branda/details_search';