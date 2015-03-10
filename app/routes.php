<?php

Route::get("/", "HomeController@index");

Route::get("/login", "AuthController@loginWithGoogle");
Route::post("/home", "AuthController@logIn");
Route::post("/register_action", "AuthController@store");
Route::get("/logout", "AuthController@logout");

Route::get("/doc", function(){
	return View::make("doc");
});

Route::get("/cv/{userid}", "CvController@index");
Route::get("/t/{id}/{useremail}", "CvController@test");

Route::get("/search/{option}/{key}/{val}", "SearchController@index");
Route::get("/search/{option}/{key}/{val}/{pretty}", "SearchController@index");
Route::get("/search/{option}/{key}/{val}/{extra}/{pretty}", "SearchController@index");

Route::resource("project", "ProjectController");
Route::resource("user", "UserController");

/* Duck punch for fixing update */
Route::post("/project/update/{id}", "ProjectController@update");
Route::get("/project/delete/{id}", "ProjectController@destroy");
Route::post("/project/addcolab/{id}", "ProjectController@addcolab");
Route::get("/project/delcolab/{project_id}/{colab_id}", "ProjectController@deletecolab");

/* might do in future! */
Route::get("/project/showfiles/{id}", "ProjectController@showfiles");
Route::get("/project/getfiles/{id}", "ProjectController@getfiles");
Route::get("/project/readfile/{id}", "ProjectController@readfile");

Route::get("/category/show/{id}", "CategoryController@show");
Route::get("/user/show", "UserController@show");
