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
//Route::resource('nerds','NerdController');
Route::get('/login', array('as' => 'login', 'uses' => 'UserController@loginWithGoogle'));


Route::post('register_action', function()
{
        $obj = new HomeController() ;
        return $obj->store();
});

Route::get('/register', 'HomeController@index');