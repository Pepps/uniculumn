<?php
class UserController extends BaseController {
    /*
        Author : Jesper
    */

    public function index() {

        return View::make('user.index')->with('user', User::find((Auth::user()->id)));

    }

    public function get($id) {

        return User::find($id);

    }

    public function edit($id) {

        return View::make('user.edit')->with('user', User::find($id));

    }

    // funtion show return Array to 'project.create' in Bloodhound div, also connected to ajax.js
    public function show() {

        return User::all()->toJson();

    }
}
