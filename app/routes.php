<?php

Route::get('/', 'HomeController@index');
//Route::resource('nerds','NerdController');

//
Route::get('/login', array('as' => 'login', 'uses' => 'UserController@loginWithGoogle'));
//Route for getting login information
Route::post('/home', array('as' => 'home', 'uses' => 'UserController@logIn'));
//Route for storing register information
Route::post('register_action', function()
{
        $obj = new HomeController() ;
        return $obj->store();
});
<<<<<<< HEAD
=======

Route::get('/users', function()


{
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

Route::resource('Project', "ProjectController");

Route::get('category/show/{id}', 'CategoryController@show');
>>>>>>> 28c7c8d2d2b39b06fe73ef7001521d51404fff5e
Route::get('/register', 'HomeController@index');
