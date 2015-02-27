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
    //var_dump(app_path(). '/projects/' . $pdir);
    $user = new User;
    $user->firstname = Input::get('fname');
    $user->lastname = Input::get('lname');
    $user->email = Input::get('email');
    $user->password = Hash::make(Input::get('password'));
    $user->pdir = $pdir;
    $user->save();

    //File::makeDirectory(app_path() . '/projects/' . $pdir);
    File::makeDirectory(app_path() . '/projects/' . $pdir, 0775, true);
    return Redirect::to('/');

  }

    public function loginWithGoogle() {

        // get data from input
        $code = Input::get( 'code' );
        // get google service
        $googleService = OAuth::consumer( 'Google' );
        // check if code is valid
        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {
            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken( $code );
            // Send a request with it
            $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );
            // Check to see if user already exists
            $user = DB::select('select id from users where email = ?', array($result['email']));
            $user = User::whereEmail($result['email'])->first(['id']);
            if (empty($user)) {
                $user = new User;
                $user->fname = $result['given_name'];
                $user->email= $result['email'];
                $user->lname = $result['family_name'];
                $user->save();
    }
            Auth::login($user);
            Session::put('key', $result['given_name']);
            return Redirect::to('/project');
        }

        // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();
            // return to google login url
            return Redirect::to( (string)$url );
        }
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
