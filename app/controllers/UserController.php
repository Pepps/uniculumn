<?php
class UserController extends BaseController {
    /*
        Author : Jesper
    */
    public function show() {

            return User::all()->toJson();

    }
}
