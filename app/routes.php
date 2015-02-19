<?php



Route::get('/', function()
{
	//return View::make('hello');
	//$users = User::find(1);
$project = User::find(1)->project;


var_dump($project);
});
