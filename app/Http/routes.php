<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('tasks', 'Task');
Route::model('notes', 'Note');

Route::bind('tasks', function($value, $route) {
	return App\Task::whereSlug($value)->first();
});
Route::bind('notes', function($value, $route) {
	return App\Note::whereSlug($value)->first();
});

Route::get('/', 'SiteController@index');
Route::any('/login', ['as' => 'site.login', 'uses' => 'SiteController@login']);
Route::any('/logout', ['as' => 'site.logout', 'uses' => 'SiteController@logout']);
Route::any('/dashboard', ['as' => 'site.dashboard', 'uses' => 'SiteController@dashboard']);
Route::any('/profile', ['as' => 'site.profile', 'uses' => 'SiteController@profile']);
Route::any('/settings', ['as' => 'site.settings', 'uses' => 'SiteController@settings']);

Route::get('/ajax/tasks',['uses' => 'TasksController@getTasksPerMonthJson']);

Route::resource('tasks', 'TasksController');
Route::resource('tasks.notes', 'NotesController');





