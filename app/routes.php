<?php


Route::get('/login', array('as' => 'login', 'uses' => 'UserController@loginWithGoogle'));


Route::post('register_action', function()
{
        $obj = new HomeController() ;
        return $obj->store();
});

Route::get('/users', function() {

});
Route::get('/doc', function(){
	return View::make('doc');
});

Route::get("/search/{option}/{key}/{val}", "SearchController@index");

Route::resource('Project', "ProjectController");

Route::get('category/show/{id}', 'CategoryController@show');
Route::get('/register', 'HomeController@index');
