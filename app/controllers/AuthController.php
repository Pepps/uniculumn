<?php

class AuthController extends BaseController {

  public function logout(){
    Auth::logout();
    return Redirect::to('/');
  }

}
