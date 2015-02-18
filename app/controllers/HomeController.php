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


	public function store(){
            $data =  Input::except(array('_token')) ;

            $rule  =  array(
                    'fname'      => 'required|unique:users',
                    'lname'		 => 'required|unique:users',
                    'email'      => 'required|email|unique:users',
                    'password'   => 'required|min:6|same:cpassword',
                    'cpassword'  => 'required|min:6'
                ) ;
 
            $validator = Validator::make($data,$rule);
 
            if ($validator->fails()){
                    return Redirect::to('register')
                            ->withErrors($validator->messages());
            }
            else{
                    
                    User::saveFormData(Input::except(array('_token','cpassword')));
 
                    return Redirect::to('register')
                            ->withMessage('Data inserted');
            }
	}


}