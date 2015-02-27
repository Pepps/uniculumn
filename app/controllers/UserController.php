<?php
class UserController extends BaseController {
    /*
        Author : Jesper
    */

    public function index() {

        return Redirect::view('index')->with(User::find($id));

    }

    public function show() {

        return User::all()->toJson();

    }

    public function get($id) {

        return User::find($id);

    }
}
