<?php

class AuthController extends BaseController {

  public function logout(){
    Auth::logout();
    return Redirect::to('/');
  }

  public function logIn(){
    //Checking if email and password match the information in the database
    $validator = Validator::make(
        array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ),
        array(
            'email' => 'required',
            'password' => 'required'
        )
    );
    $email = Input::get('email');
    $password = Input::get('password');
    if (Auth::attempt(array('email' => $email, 'password' => $password))){
      return Redirect::intended('project');
    }
    else {
      return Redirect::intended('/')->withErrors($validator)->withErrors("authError");
    }
  }

  public function store(){

    $validator = Validator::make(
      array(
          'firstname' => Input::get('fname'),
          'lastname' => Input::get('lname'),
          'email' => Input::get('email'),
          'password' => Input::get('password'),
          'Passwordconfirm' =>Input::get('cpassword')
      ),
      array(
          'firstname' => 'required|max:50|string',
          'lastname' => 'required|max:50|string',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:6|max:20',
          'Passwordconfirm' => 'same:password'
      )
    );

    if ($validator->fails()){
      return Redirect::to('/register')->withErrors($validator);
    }else{
      $pdir = Hash::make(Input::get('fname') . Input::get('lname') . date('Y/m/d'));

      $user = new User;
      $user->firstname = Input::get('fname');
      $user->lastname = Input::get('lname');
      $user->email = Input::get('email');
      $user->password = Hash::make(Input::get('password'));
      $user->pdir = $pdir;
      $user->save();

      File::makeDirectory(app_path() . '/projects/' . $pdir, 0775, true);
      return Redirect::to('/');
    }
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
                $user->firstname = $result['given_name'];
                $user->email= $result['email'];
                $user->lastname = $result['family_name'];
                $user->save();
    }
            Auth::login($user);
            Session::put('key', $result['email']);
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
}
