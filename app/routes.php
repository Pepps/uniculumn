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

Route::get('/', function(){
	//return View::make('hello');
	return "Hello world!";
});

Route::get('/doc', function(){
	return View::make('doc');
});

Route::get("/search/{option}/{key}/{val}", "SearchController@index");