<?php

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

Route::get('/', 'UsersController@login');
Route::get('login', 'UsersController@login');
Route::get('logout', 'UsersController@logout');

Route::post('authenticate','UsersController@authenticate');
Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');
Route::resource('projects', 'ProjectsController');
Route::resource('bug-types', 'BugTypesController');
Route::resource('bug_statuses', 'BugStatusesController');
Route::get('register','UsersController@register');
Route::get('dashboard','UsersController@dashboard');


Route::get('/getRolesList','RolesController@getRolesList');
Route::get('/getRole/{id}','RolesController@getRole');
Route::post('savePost','RolesController@savePost');

Route::get('getUsers','UsersController@getUsers');
