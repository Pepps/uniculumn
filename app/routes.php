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

Route::get('/', 'HomeController@index');

Route::get('/users', function()
{
	//return View::make('hello');
	//$users = User::has('project')->get();
	$users = User::all();
	return $users;
});

Route::get('/login', array('as' => 'login', 'uses' => 'UserController@loginWithGoogle'));

Route::post('/register_action', function()
{
	$obj = new HomeController() ;
	return $obj->store();
});

Route::get('/doc', function(){
	return View::make('doc');
});

Route::get("/search/{option}/{key}/{val}", "SearchController@index");

Route::resource('Project', "ProjectController");

Route::get('/register', 'HomeController@index');
