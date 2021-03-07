<?php

use Illuminate\Support\Facades\Route;

// Student Route Start

Route::post('/rate/teacher', 'TeacherController@rate_teacher')->name('rate_teacher')->middleware('studentMiddleware'); 
Route::get('/college/teachers/page/{student_id}', 'InterfaceController@college_teachers_page')->name('college_teachers_page')->middleware('studentMiddleware'); 
Route::post('/update/profile', 'StudentController@update_profile')->name('update_profile')->middleware('studentMiddleware'); 
Route::get('/college/profile/{college_id}', 'InterfaceController@college_profile_page')->name('college_profile_page')->middleware('studentMiddleware'); 
Route::get('/survey/completed', 'InterfaceController@survey_notification')->name('survey_notification')->middleware('studentMiddleware'); 
Route::post('/college/rating', 'SurveyController@rating')->name('rating')->middleware('studentMiddleware'); 
Route::post('/surveys/answers/{survey_id}','SurveyController@save_answers')->middleware('studentMiddleware');;
Route::get('/colleges/review/form/{survey_id}', 'InterfaceController@review_page')->name('review_page')->middleware('studentMiddleware'); 
Route::get('/top/colleges', 'InterfaceController@top_rated_college_page')->name('top_rated_college_page')->middleware('studentMiddleware'); 
Route::post('/student/account/verify/', 'studentController@account_verify')->name('account_verify')->middleware('studentMiddleware');
Route::get('/student/account/verify/page/{student_id}', 'InterfaceController@account_verify_page')->name('account_verify_page')->middleware('studentMiddleware');
Route::get('/student/profile/edit/{student_id}', 'InterfaceController@edit_profile_page')->name('edit_profile_page')->middleware('studentMiddleware');
Route::get('/student/profile/{student_id}', 'InterfaceController@student_profile_page')->name('student_profile_page')->middleware('studentMiddleware');
Route::get('/student/logout', 'StudentController@student_logout')->name('student_logout')->middleware('studentMiddleware');
Route::get('/student/dashboard', 'InterfaceController@student_dashboard')->name('student_dashboard')->middleware('studentMiddleware');
Route::post('/student/login', 'StudentController@student_login')->name('student_login');
Route::post('/student/register', 'StudentController@student_register')->name('student_register');
Route::get('/student/register/page', 'InterfaceController@student_register_page')->name('student_register_page');
// Student Route End

// Authority Route Start

Route::get('/authority/dashboard', 'InterfaceController@authority_dashboard_page')
->name('authority_dashboard_page')
->middleware('authorityMiddleware');

Route::get('/delete/teacher/{teacher_id}','TeacherController@delete_teacher')->name('delete_teacher')->middleware('authorityMiddleware');
Route::get('/manage/teacher/page','InterfaceController@manage_teacher_page')->name('manage_teacher_page')->middleware('authorityMiddleware');
Route::post('/add/teacher','TeacherController@add_teacher')->name('add_teacher')->middleware('authorityMiddleware');
Route::get('/add/teacher/page','InterfaceController@add_teacher_page')->name('add_teacher_page')->middleware('authorityMiddleware');
Route::get('/survey/result/page/{survey_id}','InterfaceController@survey_result_page')->name('survey_result_page')->middleware('authorityMiddleware');
Route::get('/delete/image/{image_id}','GalleryController@delete_image')->name('delete_image')->middleware('authorityMiddleware');
Route::get('/gallery/management','InterfaceController@gallery_management_page')->name('gallery_management_page')->middleware('authorityMiddleware');
Route::post('/upload/image','GalleryController@gallery_image_upload')->name('gallery_image_upload')->middleware('authorityMiddleware');
Route::get('/add/image/page','InterfaceController@add_image_page')->name('add_image_page')->middleware('authorityMiddleware');
Route::get('/publish/survey/{survey_id}','SurveyController@publish_survey')->name('publish_survey')->middleware('authorityMiddleware');
Route::get('/unpublish/survey/{survey_id}','SurveyController@unpublished_survey')->name('unpublished_survey')->middleware('authorityMiddleware');
Route::get('/delete/survey/{survey_id}','SurveyController@delete_survey')->name('delete_survey')->middleware('authorityMiddleware');
Route::get('/previous/survey/list/{authority_id}','SurveyController@get_previous_survey_list')->name('get_previous_survey_list')->middleware('authorityMiddleware');
Route::get('/delete/question/{question_id}','QuestionController@delete_question')->name('delete_question')->middleware('authorityMiddleware');
Route::post('/add/question/{survey_id}','QuestionController@add_question')->name('add_question')->middleware('authorityMiddleware');
Route::get('/create/questions/{surveyInfo}','InterfaceController@create_question')->name('create_question')->middleware('authorityMiddleware');
Route::post('/create/survey','SurveyController@create_survey')->name('create_survey')->middleware('authorityMiddleware');
Route::get('/create/survey/page','InterfaceController@create_survey_page')->name('create_survey_page')->middleware('authorityMiddleware');
Route::get('/college/info/page/{authority_id}','InterfaceController@college_info_page')->name('college_info_page')->middleware('authorityMiddleware');
Route::get('/authority/logout','LoginController@authority_logout')->name('authority_logout')->middleware('authorityMiddleware');
Route::post('/authority','LoginController@authority_login')->name('authority_login');
// Authority Route End


// Admin Route Start
Route::get('/delete/authority/{authority_id}', 'AuthorityController@delete_authority')->name('delete_authority')->middleware('adminMiddleware');
Route::get('/all/students', 'InterfaceController@all_students_page')->name('all_students_page')->middleware('adminMiddleware');
Route::post('/add/institution', 'Institution@add_institution')->name('add_institution')->middleware('adminMiddleware');
Route::get('/add/institution/page', 'InterfaceController@add_institution_page')->name('add_institution_page')->middleware('adminMiddleware');
Route::get('/student/verify/cancel{student_id}', 'studentController@student_verify_cancel')->name('student_verify_cancel')->middleware('adminMiddleware');
Route::get('/student/verify/{student_id}', 'studentController@student_verify')->name('student_verify')->middleware('adminMiddleware');
Route::get('/verify/request/list', 'InterfaceController@student_management_page')->name('student_management_page')->middleware('adminMiddleware');
Route::get('/authority/list', 'InterfaceController@manage_authority_page')->name('manage_authority_page')->middleware('adminMiddleware');

Route::post('/add/authority', 'AuthorityController@add_authority')->name('add_authority')->middleware('adminMiddleware');
Route::get('/authority/add', 'InterfaceController@add_authority_page')->name('add_authority_page')->middleware('adminMiddleware');

Route::get('/admin/dashboard', 'InterfaceController@admin_dashboard_page')
->name('admin_dashboard_page')
->middleware('adminMiddleware');

Route::post('/admin','LoginController@admin_login')->name('admin_login');
Route::get('/admin/logout','LoginController@admin_logout')->name('admin_logout')->middleware('adminMiddleware');
// Admin route End

Route::get('/authority/login', 'InterfaceController@authority_login_page')->name('authority_login_page');
Route::get('/admin/login', 'InterfaceController@admin_login_page')->name('admin_login_page');
Route::get('/student/login', 'InterfaceController@student_login_page')->name('student_login_page');
Route::get('/', 'InterfaceController@home')->name('/');

// Route::get('/', function () {
//     return view('front_end.front_master');
// });
