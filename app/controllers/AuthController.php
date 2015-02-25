<?php

class AuthController extends BaseController {

  public function logout(){
    Auth::logout();
    return Redirect::to('/');
  }

  public function store(){
  
    $user = new User;
    $user->fname = Input::get('fname');
    $user->lname = Input::get('lname');
    $user->email = Input::get('email');
    $user->password = Hash::make(Input::get('password'));
    $user->save();
    return Redirect::to('/');

  }

}
