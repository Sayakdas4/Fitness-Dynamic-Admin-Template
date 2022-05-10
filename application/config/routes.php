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

$route['default_controller'] = "home";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard_admin'] = 'user/index';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['deleteUser'] = "user/deleteUser";

$route['site_settings_listing'] = 'site_settings/site_settings_listing';
$route['site_settings_listing/(:num)'] = 'site_settings/site_settings_listing/$1';
$route['addsite_settings'] = 'site_settings/addsite_settings';
$route['addsite_settingsConfig'] = 'site_settings/addsite_settingsConfig';
$route['editsite_settings'] = 'site_settings/editsite_settings';
$route['editsite_settings/(:num)'] = 'site_settings/editsite_settings/$1';
$route['editsite_settingsConfig'] = 'site_settings/editsite_settingsConfig';
$route['deletesite_settings/(:num)'] = 'site_settings/deletesite_settings/$1';

$route['cms_listing'] = 'cms/cms_listing';
$route['cms_listing/(:num)'] = 'cms/cms_listing/$1';
$route['addcms'] = 'cms/addcms';
$route['addcmsConfig'] = 'cms/addcmsConfig';
$route['editcms'] = 'cms/editcms';
$route['editcms/(:num)'] = 'cms/editcms/$1';
$route['editcmsConfig'] = 'cms/editcmsConfig';
$route['deletecms/(:num)'] = 'cms/deletecms/$1';

$route['banner_listing'] = 'banner/banner_listing';
$route['banner_listing/(:num)'] = 'banner/banner_listing/$1';
$route['addbanner'] = 'banner/addbanner';
$route['addbannerConfig'] = 'banner/addbannerConfig';
$route['editbanner'] = 'banner/editbanner';
$route['editbanner/(:num)'] = 'banner/editbanner/$1';
$route['editbannerConfig'] = 'banner/editbannerConfig';
$route['deletebanner/(:num)'] = 'banner/deletebanner/$1';

$route['featured_in_listing'] = 'featured_in/featured_in_listing';
$route['featured_in_listing/(:num)'] = 'featured_in/featured_in_listing/$1';
$route['featured_in_details/(:num)'] = 'featured_in/featured_in_details/$1';
$route['addfeatured_in'] = 'featured_in/addfeatured_in';
$route['addfeatured_inConfig'] = 'featured_in/addfeatured_inConfig';
$route['editfeatured_in'] = 'featured_in/editfeatured_in';
$route['editfeatured_in/(:num)'] = 'featured_in/editfeatured_in/$1';
$route['editfeatured_inConfig'] = 'featured_in/editfeatured_inConfig';
$route['deletefeatured_in/(:num)'] = 'featured_in/deletefeatured_in/$1';

// $route['product_category_listing'] = 'product_category/product_category_listing';
// $route['product_category_listing/(:num)'] = 'product_category/product_category_listing/$1';
// $route['addproduct_category'] = 'product_category/addproduct_category';
// $route['addproduct_categoryConfig'] = 'product_category/addproduct_categoryConfig';
// $route['editproduct_category'] = 'product_category/editproduct_category';
// $route['editproduct_category/(:num)'] = 'product_category/editproduct_category/$1';
// $route['editproduct_categoryConfig'] = 'product_category/editproduct_categoryConfig';
// $route['deleteproduct_category/(:num)'] = 'product_category/deleteproduct_category/$1';

// $route['product_listing'] = 'product/product_listing';
// $route['product_listing/(:num)'] = 'product/product_listing/$1';
// $route['addproduct'] = 'product/addproduct';
// $route['addproductConfig'] = 'product/addproductConfig';
// $route['editproduct'] = 'product/editproduct';
// $route['editproduct/(:num)'] = 'product/editproduct/$1';
// $route['editproductConfig'] = 'product/editproductConfig';
// $route['deleteproduct/(:num)'] = 'product/deleteproduct/$1';

// $route['service_listing'] = 'service/service_listing';
// $route['service_listing/(:num)'] = 'service/service_listing/$1';
// $route['addservice'] = 'service/addservice';
// $route['addserviceConfig'] = 'service/addserviceConfig';
// $route['editservice'] = 'service/editservice';
// $route['editservice/(:num)'] = 'service/editservice/$1';
// $route['editserviceConfig'] = 'service/editserviceConfig';
// $route['deleteservice/(:num)'] = 'service/deleteservice/$1';

// $route['partner_listing'] = 'partner/partner_listing';
// $route['partner_listing/(:num)'] = 'partner/partner_listing/$1';
// $route['addpartner'] = 'partner/addpartner';
// $route['addpartnerConfig'] = 'partner/addpartnerConfig';
// $route['editpartner'] = 'partner/editpartner';
// $route['editpartner/(:num)'] = 'partner/editpartner/$1';
// $route['editpartnerConfig'] = 'partner/editpartnerConfig';
// $route['deletepartner/(:num)'] = 'partner/deletepartner/$1';

// $route['video_listing'] = 'video/video_listing';
// $route['video_listing/(:num)'] = 'video/video_listing/$1';
// $route['addvideo'] = 'video/addvideo';
// $route['addvideoConfig'] = 'video/addvideoConfig';
// $route['editvideo'] = 'video/editvideo';
// $route['editvideo/(:num)'] = 'video/editvideo/$1';
// $route['editvideoConfig'] = 'video/editvideoConfig';
// $route['deletevideo/(:num)'] = 'video/deletevideo/$1';

// $route['client_listing'] = 'client/client_listing';
// $route['client_listing/(:num)'] = 'client/client_listing/$1';
// $route['addclient'] = 'client/addclient';
// $route['addclientConfig'] = 'client/addclientConfig';
// $route['editclient'] = 'client/editclient';
// $route['editclient/(:num)'] = 'client/editclient/$1';
// $route['editclientConfig'] = 'client/editclientConfig';
// $route['deleteclient/(:num)'] = 'client/deleteclient/$1';

// $route['application_listing'] = 'application/application_listing';
// $route['application_listing/(:num)'] = 'application/application_listing/$1';
// $route['addapplication'] = 'application/addapplication';
// $route['addapplicationConfig'] = 'application/addapplicationConfig';
// $route['editapplication'] = 'application/editapplication';
// $route['editapplication/(:num)'] = 'application/editapplication/$1';
// $route['editapplicationConfig'] = 'application/editapplicationConfig';
// $route['deleteapplication/(:num)'] = 'application/deleteapplication/$1';

$route['home_management_listing'] = 'home_management/home_management_listing';
$route['home_management_listing/(:num)'] = 'home_management/home_management_listing/$1';
$route['addhome_management'] = 'home_management/addhome_management';
$route['addhome_managementConfig'] = 'home_management/addhome_managementConfig';
$route['edithome_management'] = 'home_management/edithome_management';
$route['edithome_management/(:num)'] = 'home_management/edithome_management/$1';
$route['edithome_managementConfig'] = 'home_management/edithome_managementConfig';
$route['deletehome_management/(:num)'] = 'home_management/deletehome_management/$1';

$route['about_us_management_listing'] = 'about_us_management/about_us_management_listing';
$route['about_us_management_listing/(:num)'] = 'about_us_management/about_us_management_listing/$1';
$route['addabout_us_management'] = 'about_us_management/addabout_us_management';
$route['addabout_us_managementConfig'] = 'about_us_management/addabout_us_managementConfig';
$route['editabout_us_management'] = 'about_us_management/editabout_us_management';
$route['editabout_us_management/(:num)'] = 'about_us_management/editabout_us_management/$1';
$route['editabout_us_managementConfig'] = 'about_us_management/editabout_us_managementConfig';
$route['deleteabout_us_management/(:num)'] = 'about_us_management/deleteabout_us_management/$1';

$route['performance_state_listing'] = 'performance_state/performance_state_listing';
$route['performance_state_listing/(:num)'] = 'performance_state/performance_state_listing/$1';
$route['addperformance_state'] = 'performance_state/addperformance_state';
$route['addperformance_stateConfig'] = 'performance_state/addperformance_stateConfig';
$route['editperformance_state'] = 'performance_state/editperformance_state';
$route['editperformance_state/(:num)'] = 'performance_state/editperformance_state/$1';
$route['editperformance_stateConfig'] = 'performance_state/editperformance_stateConfig';
$route['deleteperformance_state/(:num)'] = 'performance_state/deleteperformance_state/$1';

$route['team_listing'] = 'team/team_listing';
$route['team_listing/(:num)'] = 'team/team_listing/$1';
$route['team_details/(:num)'] = 'team/team_details/$1';
$route['addteam'] = 'team/addteam';
$route['addteamConfig'] = 'team/addteamConfig';
$route['editteam'] = 'team/editteam';
$route['editteam/(:num)'] = 'team/editteam/$1';
$route['editteamConfig'] = 'team/editteamConfig';
$route['deleteteam/(:num)'] = 'team/deleteteam/$1';

$route['success_stories_listing'] = 'success_stories/success_stories_listing';
$route['success_stories_listing/(:num)'] = 'success_stories/success_stories_listing/$1';
$route['success_stories_details/(:num)'] = 'success_stories/success_stories_details/$1';
$route['addsuccess_stories'] = 'success_stories/addsuccess_stories';
$route['addsuccess_storiesConfig'] = 'success_stories/addsuccess_storiesConfig';
$route['editsuccess_stories'] = 'success_stories/editsuccess_stories';
$route['editsuccess_stories/(:num)'] = 'success_stories/editsuccess_stories/$1';
$route['editsuccess_storiesConfig'] = 'success_stories/editsuccess_storiesConfig';
$route['deletesuccess_stories/(:num)'] = 'success_stories/deletesuccess_stories/$1';

$route['faq_listing'] = 'faq/faq_listing';
$route['faq_listing/(:num)'] = 'faq/faq_listing/$1';
$route['faq_details/(:num)'] = 'faq/faq_details/$1';
$route['addfaq'] = 'faq/addfaq';
$route['addfaqConfig'] = 'faq/addfaqConfig';
$route['editfaq'] = 'faq/editfaq';
$route['editfaq/(:num)'] = 'faq/editfaq/$1';
$route['editfaqConfig'] = 'faq/editfaqConfig';
$route['deletefaq/(:num)/(:num)'] = 'faq/deletefaq/$1/$2';

$route['kick_starter_includes_listing'] = 'kick_starter_includes/kick_starter_includes_listing';
$route['kick_starter_includes_listing/(:num)'] = 'kick_starter_includes/kick_starter_includes_listing/$1';
$route['addkick_starter_includes'] = 'kick_starter_includes/addkick_starter_includes';
$route['addkick_starter_includesConfig'] = 'kick_starter_includes/addkick_starter_includesConfig';
$route['editkick_starter_includes'] = 'kick_starter_includes/editkick_starter_includes';
$route['editkick_starter_includes/(:num)'] = 'kick_starter_includes/editkick_starter_includes/$1';
$route['editkick_starter_includesConfig'] = 'kick_starter_includes/editkick_starter_includesConfig';
$route['deletekick_starter_includes/(:num)'] = 'kick_starter_includes/deletekick_starter_includes/$1';

$route['kick_starter_pricing_listing'] = 'kick_starter_pricing/kick_starter_pricing_listing';
$route['kick_starter_pricing_listing/(:num)'] = 'kick_starter_pricing/kick_starter_pricing_listing/$1';
$route['addkick_starter_pricing'] = 'kick_starter_pricing/addkick_starter_pricing';
$route['addkick_starter_pricingConfig'] = 'kick_starter_pricing/addkick_starter_pricingConfig';
$route['editkick_starter_pricing'] = 'kick_starter_pricing/editkick_starter_pricing';
$route['editkick_starter_pricing/(:num)'] = 'kick_starter_pricing/editkick_starter_pricing/$1';
$route['editkick_starter_pricingConfig'] = 'kick_starter_pricing/editkick_starter_pricingConfig';
$route['deletekick_starter_pricing/(:num)'] = 'kick_starter_pricing/deletekick_starter_pricing/$1';

$route['kick_starter_work_listing'] = 'kick_starter_work/kick_starter_work_listing';
$route['kick_starter_work_listing/(:num)'] = 'kick_starter_work/kick_starter_work_listing/$1';
$route['addkick_starter_work'] = 'kick_starter_work/addkick_starter_work';
$route['addkick_starter_workConfig'] = 'kick_starter_work/addkick_starter_workConfig';
$route['editkick_starter_work'] = 'kick_starter_work/editkick_starter_work';
$route['editkick_starter_work/(:num)'] = 'kick_starter_work/editkick_starter_work/$1';
$route['editkick_starter_workConfig'] = 'kick_starter_work/editkick_starter_workConfig';
$route['deletekick_starter_work/(:num)'] = 'kick_starter_work/deletekick_starter_work/$1';

$route['coaching_includes_listing'] = 'coaching_includes/coaching_includes_listing';
$route['coaching_includes_listing/(:num)'] = 'coaching_includes/coaching_includes_listing/$1';
$route['addcoaching_includes'] = 'coaching_includes/addcoaching_includes';
$route['addcoaching_includesConfig'] = 'coaching_includes/addcoaching_includesConfig';
$route['editcoaching_includes'] = 'coaching_includes/editcoaching_includes';
$route['editcoaching_includes/(:num)'] = 'coaching_includes/editcoaching_includes/$1';
$route['editcoaching_includesConfig'] = 'coaching_includes/editcoaching_includesConfig';
$route['deletecoaching_includes/(:num)'] = 'coaching_includes/deletecoaching_includes/$1';

$route['coaching_pricing_listing'] = 'coaching_pricing/coaching_pricing_listing';
$route['coaching_pricing_listing/(:num)'] = 'coaching_pricing/coaching_pricing_listing/$1';
$route['addcoaching_pricing'] = 'coaching_pricing/addcoaching_pricing';
$route['addcoaching_pricingConfig'] = 'coaching_pricing/addcoaching_pricingConfig';
$route['editcoaching_pricing'] = 'coaching_pricing/editcoaching_pricing';
$route['editcoaching_pricing/(:num)'] = 'coaching_pricing/editcoaching_pricing/$1';
$route['editcoaching_pricingConfig'] = 'coaching_pricing/editcoaching_pricingConfig';
$route['deletecoaching_pricing/(:num)'] = 'coaching_pricing/deletecoaching_pricing/$1';

$route['coaching_work_listing'] = 'coaching_work/coaching_work_listing';
$route['coaching_work_listing/(:num)'] = 'coaching_work/coaching_work_listing/$1';
$route['addcoaching_work'] = 'coaching_work/addcoaching_work';
$route['addcoaching_workConfig'] = 'coaching_work/addcoaching_workConfig';
$route['editcoaching_work'] = 'coaching_work/editcoaching_work';
$route['editcoaching_work/(:num)'] = 'coaching_work/editcoaching_work/$1';
$route['editcoaching_workConfig'] = 'coaching_work/editcoaching_workConfig';
$route['deletecoaching_work/(:num)'] = 'coaching_work/deletecoaching_work/$1';

$route['fitness_recipe_listing'] = 'fitness_recipe/fitness_recipe_listing';
$route['fitness_recipe_listing/(:num)'] = 'fitness_recipe/fitness_recipe_listing/$1';
$route['addfitness_recipe'] = 'fitness_recipe/addfitness_recipe';
$route['addfitness_recipeConfig'] = 'fitness_recipe/addfitness_recipeConfig';
$route['editfitness_recipe'] = 'fitness_recipe/editfitness_recipe';
$route['editfitness_recipe/(:num)'] = 'fitness_recipe/editfitness_recipe/$1';
$route['editfitness_recipeConfig'] = 'fitness_recipe/editfitness_recipeConfig';
$route['deletefitness_recipe/(:num)'] = 'fitness_recipe/deletefitness_recipe/$1';

$route['exercise_video_listing'] = 'exercise_video/exercise_video_listing';
$route['exercise_video_listing/(:num)'] = 'exercise_video/exercise_video_listing/$1';
$route['addexercise_video'] = 'exercise_video/addexercise_video';
$route['addexercise_videoConfig'] = 'exercise_video/addexercise_videoConfig';
$route['editexercise_video'] = 'exercise_video/editexercise_video';
$route['editexercise_video/(:num)'] = 'exercise_video/editexercise_video/$1';
$route['editexercise_videoConfig'] = 'exercise_video/editexercise_videoConfig';
$route['deleteexercise_video/(:num)'] = 'exercise_video/deleteexercise_video/$1';

$route['knowledge_library_listing'] = 'knowledge_library/knowledge_library_listing';
$route['knowledge_library_listing/(:num)'] = 'knowledge_library/knowledge_library_listing/$1';
$route['addknowledge_library'] = 'knowledge_library/addknowledge_library';
$route['addknowledge_libraryConfig'] = 'knowledge_library/addknowledge_libraryConfig';
$route['editknowledge_library'] = 'knowledge_library/editknowledge_library';
$route['editknowledge_library/(:num)'] = 'knowledge_library/editknowledge_library/$1';
$route['editknowledge_libraryConfig'] = 'knowledge_library/editknowledge_libraryConfig';
$route['deleteknowledge_library/(:num)'] = 'knowledge_library/deleteknowledge_library/$1';

$route['order_listing'] = 'order/order_listing';
$route['order_listing/(:num)'] = 'order/order_listing/$1';

$route['contact/(:num)'] = "user/contact/$1";
$route['editContactConfig'] = "user/editContactConfig";

$route['contact_query_listing'] = 'Contact_query/contact_query_listing';
$route['contact_query_listing/(:num)'] = 'Contact_query/contact_query_listing/$1';


$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";


// Front
// $route['signin'] = "signin/index";
$route['signin'] = "google_login/google_signin";
// $route['dashboard'] = "google_login/google_signin";
$route['signinme'] = "signin/signinme";
// $route['signup'] = "signup/index";
$route['signupme'] = "signup/signupme";
$route['reset'] = "signin/reset";
$route['reset_password'] = "signin/reset_password";
$route['resetpassword/(:any)'] = "signin/resetpassword/$1";
// $route['dashboard'] = 'dashboard/index';
$route['signout'] = 'dashboard/signout';
$route['index'] = "home/index";
$route['about-us'] = "home/about_us";
$route['team'] = "home/team";
$route['team-details/(:any)'] = "home/team_details/$1";
$route['success-stories'] = "home/success_stories";
$route['success-stories/(:num)'] = "home/success_stories/$1";
$route['kick-starter'] = "home/kick_starter";
$route['confirmation'] = "payumoney/index";
$route['coaching'] = "home/coaching";
$route['faq'] = "home/faq";
$route['fitness-recipe'] = "home/fitness_recipe";
$route['fitness-recipe/(:num)'] = "home/fitness_recipe/$1";
$route['fitness-recipe-details/(:num)'] = "home/fitness_recipe_details/$1";
$route['exercise-video'] = "home/exercise_video";
$route['exercise-video/(:num)'] = "home/exercise_video/$1";
$route['exercise-video-details/(:num)'] = "home/exercise_video_details/$1";
$route['knowledge-library'] = "home/knowledge_library";
$route['knowledge-library/(:num)'] = "home/knowledge_library/$1";
$route['knowledge-library-details/(:num)'] = "home/knowledge_library_details/$1";

$route['privacy-policy'] = "home/privacy_policy";
$route['terms-conditions'] = "home/terms_conditions";
$route['refund-policy'] = "home/refund_policy";

// Payment
// $route['payment'] = 'razorpay/payment';
// $route['payment/(:num)'] = 'razorpay/payment/$1';
$route['callback'] = 'razorpay/callback';
$route['checkout_kick_starter'] = 'razorpay/checkout_kick_starter';
$route['checkout_coaching'] = 'razorpay/checkout_coaching';
$route['payment-success/(:any)'] = 'razorpay/payment_success/$1';
$route['payment-failed'] = 'razorpay/payment_failed';



// Currency
// $route['convert'] = 'currencies/convert';
$route['convert'] = 'currencies/convert';