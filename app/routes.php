<?php

Route::get("/", "AuthController@googleStatus");
Route::get('/', 'HomeController@index');


//
Route::get('/login', array('as' => 'login', 'uses' => 'AuthController@loginWithGoogle'));
//Route for getting login information
Route::post('/home', array('as' => 'home', 'uses' => 'AuthController@logIn'));
//Route for storing register information
Route::post('/register_action', "AuthController@store");

Route::get("/logout", "AuthController@logout");

Route::get('/doc', function(){
	return View::make('doc');
});

Route::get("/search/{option}/{key}/{val}", "SearchController@index");
Route::get("/search/{option}/{key}/{val}/{pretty}", "SearchController@index");

Route::resource('project', "ProjectController");
/* Duck punch for fixing update */
Route::post('/project/update/{id}', "ProjectController@update");
Route::get('/project/delete/{id}', "ProjectController@destroy");

Route::get('category/show/{id}', 'CategoryController@show');

Route::get('/register', 'HomeController@index');
