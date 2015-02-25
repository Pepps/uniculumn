<?php

class AuthController extends BaseController {

  public function logout(){
    Auth::logout();
    return Redirect::to('/');
  }

  public function logIn(){
    //Checking if email and password match the information in the database
    $email = Input::get('email');
    $password = Input::get('password');
    if (Auth::attempt(array('email' => $email, 'password' => $password))){
    return Redirect::intended('project');
    }
    else {
    return Redirect::intended('/')->with('loginError','Något gick fel');
    }
  }

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
    $pdir = Hash::make(Input::get('fname') . Input::get('lname') . date('Y/m/d'));
    $user = new User;
    $user->firstname = Input::get('fname');
    $user->lastname = Input::get('lname');
    $user->email = Input::get('email');
    $user->password = Hash::make(Input::get('password'));
    $user->pdir = $pdir;
    $user->save();

    File::makeDirectory(app_path() . '/projects/' . $pdir);
    return Redirect::to('/');

  }


    public function googleStatus() {

        // get data from input
        $code = Input::get( 'code' );
        // get google service
        $googleService = OAuth::consumer( 'Google' );
        // check if code is valid
        // if code is provided get user data and sign in
        if ( empty( $code ) ) {
            // This was a callback request from google, get the token
            Session::put('key', 'Logga in med Chrome');
            return Redirect::to('/');
        }
    }
}
