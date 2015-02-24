<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){
		return View::make('home');
	}

    //this function stores the information in the database
	public function store(){

            //$data =  Input::except(array('_token')) ;

                $pdir = Hash::make(Input::get('fname') . Input::get('lname') . date("Y/m/d"));
                $user = new User;
                $user->firstname = Input::get('fname');
                $user->lastname = Input::get('lname');
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->pdir = $pdir;
                $user->save();
                File::makeDirectory(app_path() . "/projects/" . $pdir);

                return Redirect::to('/');
    }

}


