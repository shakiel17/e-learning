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
#
//=====================Admin Route==========================
$route['delete_game_question/(:any)/(:any)'] = 'pages/delete_game_question/$1/$2';
$route['save_game_question'] = 'pages/save_game_question';
$route['manage_games_question/(:any)'] = 'pages/manage_games_question/$1';
$route['delete_game/(:any)'] = 'pages/delete_game/$1';
$route['save_game'] = 'pages/save_game';
$route['manage_games'] = 'pages/manage_games';
$route['delete_student/(:any)'] = 'pages/delete_student/$1';
$route['save_student'] = 'pages/save_student';
$route['manage_student'] = 'pages/manage_student';
$route['delete_users/(:any)'] = 'pages/delete_users/$1';
$route['save_users'] = 'pages/save_users';
$route['manage_users'] = 'pages/manage_users';
$route['adminlogout'] = 'pages/adminlogout';
$route['adminmain'] = 'pages/adminmain';
$route['admin_authenticate'] = 'pages/admin_authenticate';
$route['admin'] = 'pages/admin';
//=====================Teacher Route========================
$route['save_quiz_score'] = 'pages/save_quiz_score';
$route['save_assignment_score'] = 'pages/save_assignment_score';
$route['student_details/(:any)'] = 'pages/student_details/$1';
$route['update_quiz_status/(:any)/(:any)/(:any)/(:any)'] = 'pages/update_quiz_status/$1/$2/$3/$4';
$route['view_quiz/(:any)'] = 'pages/view_quiz/$1';
$route['save_quiz_attachment'] = 'pages/save_quiz_attachment';
$route['remove_quiz_attachment/(:any)/(:any)/(:any)'] = 'pages/remove_quiz_attachment/$1/$2/$3';
$route['save_quiz'] = 'pages/save_quiz';
$route['manage_quiz/(:any)/(:any)'] = 'pages/manage_quiz/$1/$2';
$route['update_assignment_status/(:any)/(:any)/(:any)/(:any)'] = 'pages/update_assignment_status/$1/$2/$3/$4';
$route['view_assignment/(:any)'] = 'pages/view_assignment/$1';
$route['save_assignment_attachment'] = 'pages/save_assignment_attachment';
$route['remove_assignment_attachment/(:any)/(:any)/(:any)'] = 'pages/remove_assignment_attachment/$1/$2/$3';
$route['save_assignment'] = 'pages/save_assignment';
$route['manage_assignment/(:any)/(:any)'] = 'pages/manage_assignment/$1/$2';
$route['update_topic_status/(:any)/(:any)/(:any)'] = 'pages/update_topic_status/$1/$2/$3';
$route['remove_topic_attachment/(:any)/(:any)'] = 'pages/remove_topic_attachment/$1/$2';
$route['view_topic/(:any)'] = 'pages/view_topic/$1';
$route['save_topic_attachment'] = 'pages/save_topic_attachment';
$route['save_topic'] = 'pages/save_topic';
$route['manage_topics/(:any)'] = 'pages/manage_topics/$1';
$route['update_lesson_status/(:any)/(:any)'] = 'pages/update_lesson_status/$1/$2';
$route['save_lessons'] = 'pages/save_lessons';
$route['manage_lessons'] = 'pages/manage_lessons';
$route['student_list'] = 'pages/student_list';
$route['teacherlogout'] = 'pages/teacherlogout';
$route['teachermain'] = 'pages/teachermain';
$route['teacher_authenticate'] = 'pages/teacher_authenticate';
$route['teacher'] = 'pages/teacher';
//=====================User Route===========================
$route['save_result/(:any)/(:any)/(:any)/(:any)'] = 'pages/save_result/$1/$2/$3/$4';
$route['check_answer/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'pages/check_answer/$1/$2/$3/$4/$5';
$route['submit_answer'] = 'pages/submit_answer';
$route['start_game/(:any)/(:any)/(:any)'] = 'pages/start_game/$1/$2/$3';
$route['enter_game/(:any)'] = 'pages/enter_game/$1';
$route['games_list'] = 'pages/games_list';
$route['view_my_quiz/(:any)'] = 'pages/view_my_quiz/$1';
$route['save_student_quiz_attachment'] = 'pages/save_student_quiz_attachment';
$route['view_my_assignment/(:any)'] = 'pages/view_my_assignment/$1';
$route['save_student_assignment_attachment'] = 'pages/save_student_assignment_attachment';
$route['remove_student_assignment_attachment/(:any)/(:any)/(:any)'] = 'pages/remove_student_assignment_attachment/$1/$2/$3';
$route['view_student_assignment/(:any)/(:any)'] = 'pages/view_student_assignment/$1/$2';
$route['view_student_quiz/(:any)/(:any)'] = 'pages/view_student_quiz/$1/$2';
$route['view_lesson_topic/(:any)'] = 'pages/view_lesson_topic/$1';
$route['student_lesson'] = 'pages/student_lesson';
$route['main'] = 'pages/main';
$route['student_authenticate'] = 'pages/student_authenticate';
$route['registration'] = 'pages/registration';
$route['signup'] = 'pages/signup';
$route['logout'] = 'pages/logout';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
