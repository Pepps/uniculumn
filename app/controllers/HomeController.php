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

            $user = new User;
            $user->fname = Input::get('fname');
            $user->lname = Input::get('lname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
 
           // $validator = Validator::make($data,$user);
 
           // if ($validator->fails()){
            //        return Redirect::to('register')
            //                ->withErrors($validator->messages());
          //  }
         //   else{
                    
            //        User::saveFormData(Input::except(array('_token','cpassword')));
 
            //return Redirect::to('register')
         //                   ->withMessage('Data inserted');
        }
}


