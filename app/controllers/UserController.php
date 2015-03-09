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

    public function update($id) {

        $User = User::find($id);
        $User->firstname    =   Input::get("user_title");
        $User->lastname     =   Input::get("lastname");
        $User->email        =   Input::get("email");
        $User->state        =   Input::get("state");
        $User->city         =   Input::get("city");
        $User->address      =   Input::get("address");
        $User->postnumber   =   Input::get("postnumber");
        $User->phone        =   Input::get("phone");
        $User->save();
        return Redirect::to('/user');

    }

    // funtion show return Array to 'project.create' in Bloodhound div, also connected to ajax.js
    public function show() {

        return User::all()->toJson();

    }
}
