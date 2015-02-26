<?php
class UserController extends BaseController {
    /*
        Author : Joakim
    */
    public function show() {

            return User::all()->toJson();

    }
}
