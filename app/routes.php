<?php

header('Access-Control-Allow-Origin: *  ');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');
Route::resource('projects', 'ProjectsController');
Route::resource('bug-types', 'BugTypesController');
Route::resource('bug-statuses', 'BugStatusesController');
Route::resource('bugs', 'BugsController');
Route::resource('todo-statuses', 'TodoStatusesController');
Route::resource('todos', 'TodosController');

Route::get('/', 'UsersController@login');
Route::get('login', 'UsersController@login');
Route::get('logout', 'UsersController@logout');
Route::post('authenticate','UsersController@authenticate');
Route::get('register','UsersController@register');
Route::get('dashboard','UsersController@dashboard');
Route::get('getUsers','UsersController@getUsers');
Route::get('profile','UsersController@profile');
Route::get('forgot-password','UsersController@forgotPassword');
Route::post('sendEmail','UsersController@sendForgotPasswordEmail');



//apis for angular app
Route::get('/getRolesList','RolesController@getRolesList');
Route::get('/getRole/{id}','RolesController@getRole');
Route::post('savePost','RolesController@savePost');

Route::get('/getTodos/{userId}','TodosController@getTodos');
Route::get('/getTodos/{userId}/{projectId}','TodosController@getTodos');
Route::post('/saveTodo','TodosController@saveTodo');
Route::get('getTodo/{id}/{userId}','TodosController@getTodo');
Route::put('updateTodo/{id}','TodosController@updateTodo');
Route::delete('deleteTodo/{todoId}','TodosController@deleteTodo');
Route::get('getAllActiveProjectListByUser/{userId}','ProjectsController@getAllActiveProjectListByUser');
Route::post('sign-in','UsersController@signIn');
Route::get('my-projects/{userId}','ProjectsController@myProjects');
Route::get('get-project-details/{id}','ProjectsController@getProjectDetails');
Route::get('get-all-bugs/{userId}','BugsController@getAllBugs');
Route::get('getProjectsAndbugType/{userId}','ProjectsController@getProjectsAndbugType');
Route::post('add-bug','BugsController@addBug');
Route::get('get-project-users/{projectId}','ProjectsController@getProjectUsers');
Route::get('get-bug-details/{bugId}', 'BugsController@getBugDetails');
Route::get('get-todo-group','TodoGroupsController@getGroupList');
Route::get('get-todo-priority','TodoPrioritiesController@getPriorityList');



//hello



