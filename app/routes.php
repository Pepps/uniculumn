<?php

Route::get('/', 'HomeController@index');
//Route::resource('nerds','NerdController');
Route::get('/login', array('as' => 'login', 'uses' => 'UserController@loginWithGoogle'));


Route::post('register_action', function()
{
        $obj = new HomeController() ;
        return $obj->store();
});

Route::get('/users', function(){
	//return View::make('hello');
	//$users = User::find(1);
$project = User::find(1)->project;


var_dump($project);
});

Route::get('/doc', function(){
	return View::make('doc');
});

Route::get("/search/{option}/{key}/{val}", "SearchController@index");
Route::get("/search/{option}/{key}/{val}/{pretty}", "SearchController@index");

Route::resource('project', "ProjectController");

Route::get('category/show/{id}', 'CategoryController@show');
Route::get('/register', 'HomeController@index');
