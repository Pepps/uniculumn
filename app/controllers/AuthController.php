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

                        /*
            if ($validator->fails()){
                $messages = $validator->messages();

                return Redirect::to('')->withErrors($validator->messages($validator));
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
