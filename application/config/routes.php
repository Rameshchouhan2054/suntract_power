<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Frontent/FrontentController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['signup-save'] = 'Frontent/Frontent/signup_save';
// $route['login-form'] = 'Frontent/Frontent/login';

//------------------------------------------------------------------------------------------
//------------Frontent------------------ Frontent --------------------------Frontent--------
//------------------------------------------------------------------------------------------ 


$route['contact-us'] = 'Frontent/FrontentController/contact_us';
$route['about-us'] = 'Frontent/FrontentController/about_us';
$route['faq'] = 'Frontent/FrontentController/faq';
$route['add-query'] = 'Frontent/FrontentController/add_query';
$route['services/(:any)'] = 'Frontent/FrontentController/services/$1';
$route['services'] = 'Frontent/FrontentController/services';
$route['gallery'] = 'Frontent/FrontentController/gallery';
$route['news'] = 'Frontent/FrontentController/news';







//------------------------------------------------------------------------------------------
//------------Backend--------------------- Backend --------------------------Backend--------
//------------------------------------------------------------------------------------------

$route['admin'] = 'Backend/admin/AdminDashboard/index';
$route['login'] = 'Backend/admin/AdminLoginController/showLoginForm';
$route['logout'] = 'Backend/admin/AdminLogoutController/logout';
// $route['Registration']='Backend/admin/AdminLoginController/index';
// $route['registration']='Backend/admin/AdminLoginController/register_user';

//backend users
$route['backend-user-form'] = 'Backend/admin/UserController/addBackendUser';
$route['edit-backend-user/(:num)'] = 'Backend/admin/UserController/addBackendUser/$1';
$route['delete-user/(:num)'] = 'Backend/admin/UserController/delete_user/$1';
$route['backend-user-list'] = 'Backend/admin/UserController/backend_user_list';
$route['check-username-exist'] = 'Backend/admin/UserController/check_usernameOrEmail_exist';
$route['check-email-exist'] = 'Backend/admin/UserController/check_usernameOrEmail_exist';

//query
$route['settled-query-list'] ='Backend/admin/QueryController/settled_query_list'; 
$route['unsettled-query-list'] ='Backend/admin/QueryController/unsettled_query_list';
$route['settle-query'] ='Backend/admin/QueryController/settle_query'; 
$route['view-query/(:num)'] ='Backend/admin/QueryController/view_query/$1'; 

//testimonial
$route['testimonial-list'] ='Backend/admin/TestimonialController/testimonial_list';
$route['tesimonial-form'] = 'Backend/admin/TestimonialController/addTestimonial';
$route['tesimonial-form/(:num)'] = 'Backend/admin/TestimonialController/addTestimonial/$1';
$route['delete-testimonial/(:num)'] = 'Backend/admin/TestimonialController/delete_tesimonial/$1';

//slider
$route['slider-image-list'] ='Backend/admin/SliderController/slider_image_list';
$route['slider-image-form'] = 'Backend/admin/SliderController/addSliderImage';
$route['slider-image-form/(:num)'] = 'Backend/admin/SliderController/addSliderImage/$1';

//Gallery
$route['gallery-image-list'] ='Backend/admin/GalleryController/gallery_image_list';
$route['gallery-image-form'] = 'Backend/admin/GalleryController/addGalleryImage';
$route['gallery-image-form/(:num)'] = 'Backend/admin/GalleryController/addGalleryImage/$1';
$route['delete-gallery-image/(:num)'] = 'Backend/admin/GalleryController/delete_image/$1';

//News
$route['news-list'] ='Backend/admin/NewsController/news_list';
$route['news-form'] = 'Backend/admin/NewsController/addNews';
$route['news-form/(:num)'] = 'Backend/admin/NewsController/addNews/$1';
$route['delete-news/(:num)'] = 'Backend/admin/NewsController/delete_news/$1';



//Team Members
$route['team-member-list'] ='Backend/admin/TeamController/team_member_list';
$route['team-member-form'] = 'Backend/admin/TeamController/addTeamMember';
$route['team-member-form/(:num)'] = 'Backend/admin/TeamController/addTeamMember/$1';
$route['delete-team-member/(:num)'] = 'Backend/admin/TeamController/delete_team_member/$1';

$route['statistics'] ='Backend/admin/TeamController/statistics';

//projects

$route['Projects'] ='Backend/admin/ProjectsController/Project_list';
$route['add-project'] = 'Backend/admin/ProjectsController/addProject';
$route['add-project/(:num)'] = 'Backend/admin/ProjectsController/addProject/$1';
$route['delete-project/(:num)'] = 'Backend/admin/ProjectsController/delete_project/$1';


