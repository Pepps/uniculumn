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
            /*$validator = Validator::make(
                array(
                    'fname' => Input::get('fname'),
                    'lname' => Input::get('lname'),
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                    'cpassword' => Input::get('cpassword')
                    ),
                array(
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:8',
                    'cpassword' => 'same:password'
                    )
                );*/

            //$data =  Input::except(array('_token')) ;

						$user = new User;
						$user->fname = Input::get('fname');
						$user->lname = Input::get('lname');
						$user->email = Input::get('email');
						$user->password = Hash::make(Input::get('password'));
						$user->save();
						return Redirect::to('/');

						/*
            if ($validator->fails()){
                return Redirect::to('home')->withErrors($validator->messages());
            }
            else{
                $user = new User;
                $user->fname = Input::get('fname');
                $user->lname = Input::get('lname');
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                return Redirect::to('home')->withMessage('Data inserted');
        }*/
    }
}
