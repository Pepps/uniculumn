<?php

Route::get("/", "HomeController@index");

Route::get("/login", "AuthController@loginWithGoogle");
Route::post("/home", "AuthController@logIn");
Route::post("/register_action", "AuthController@store");
Route::get("/logout", "AuthController@logout");

Route::get("/doc", function(){
	return View::make("doc");
});

Route::get("/register", function(){
    return View::make("user.register");
});

Route::get("/isa", function(){
	return View::make("project.upload");
});

Route::get("/cv/{userid}", "CvController@index");
Route::get("/t/{id}/{useremail}", "CvController@test");

Route::get("/search/{option}/{key}/{val}", "SearchController@index");
Route::get("/search/{option}/{key}/{val}/{pretty}", "SearchController@index");
Route::get("/search/{option}/{key}/{val}/{extra}/{pretty}", "SearchController@index");

Route::resource('project', "ProjectController");
Route::resource('user', "UserController");
Route::post('apply/upload', 'ProjectController@store');
Route::post('/user/update/{id}', "UserController@update");

/* Duck punch for fixing update */
Route::post('/project/update/{id}', "ProjectController@update");
Route::get('/project/delete/{id}', "ProjectController@destroy");
Route::post('/project/addcolab/{id}', "ProjectController@addcolab");
Route::get('/project/delcolab/{project_id}/{colab_id}', "ProjectController@deletecolab");

Route::get('/project/showfiles/{id}', "ProjectController@showfiles");
Route::get('/project/getfiles/{id}', "ProjectController@getfiles");
Route::get('/project/readfile/{id}', "ProjectController@readfile");

/* Routes for experiences */
Route::resource('experience', "ExperienceController");
Route::get('/experience/{id}/addref/', "ExperienceController@newref");
Route::post('/experience/{id}/addref/', array('as' => 'addref', 'uses' => "ExperienceController@addref"));

Route::get('/state/{id}/', "ExperienceController@getcities");

Route::get('category/show/{id}', 'CategoryController@show');
Route::get('state/show/{id}', 'StateController@show');
Route::get('city/show/{id}', 'CityController@show');
Route::get('/user/show', 'UserController@show');
