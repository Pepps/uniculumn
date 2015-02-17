<?php


class UserController extends BaseController {

	/*
		Author : Joakim
	*/

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

            if (empty($user)) {
                $new_user = new User();
                $new_user->email = $result['email'];
                $new_user->fname = $result['given_name'];
                $new_user->lname = $result['family_name'];
                $new_user->googleauth_token = $result['id'];
                $new_user->save();
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

}
