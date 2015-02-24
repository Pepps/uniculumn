<?php


class UserController extends BaseController {

	/*
		Author : Joakim
	*/
    public function register(){


    }
	public function loginWithGoogle() {
        echo 1;
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
            $user = DB::select('select user_id from users where email = ?', array($result['email']));

            $user = User::whereEmail($result['email'])->first(['user_id']);

            $call = new ReflectionClass('googleService');
            $methods = $call->getMethods();
            var_dump($methods);

            if (empty($user)) {
                $user = new User;
                $user->fname = $result['given_name'];
                $user->email= $result['email'];
                $user->lname = $result['family_name'];

                $user->save();
            }
            Auth::login($user);
        }
    	// if not ask for permission first
   		else {
        	// get googleService authorization
        	$url = $googleService->getAuthorizationUri();

        	// return to google login url
        	return Redirect::to( (string)$url );
        }

    }

    public function logIn(){
        //Checking if email and password match the information in the database
        $email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(array('email' => $email, 'password' => $password))){
            echo 1;


        }
    }
}
