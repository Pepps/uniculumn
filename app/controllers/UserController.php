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

        return View::make('user.edit')->with('user', User::find($id))->with("states", State::all());

    }

    public function update($id) {

        $user = User::find($id);
        $user->firstname    =   Input::get("firstname");
        $user->lastname     =   Input::get("lastname");
        $user->email        =   Input::get("email");
        //$user->state        =   Input::get("state");
        //$user->city         =   Input::get("city");
        $user->address      =   Input::get("address");
        $user->postnumber   =   Input::get("postnumber");
        $user->phone        =   Input::get("phone");
        $user->save();

        User::find($user->id)->state()->attach(explode("-", Input::get('subcategory_id')));
        User::find($user->id)->city()->attach(explode("-", Input::get('user_id')));
        //Project::find($project->id)->user()->attach(explode("-", Input::get('collaborators_id')));
        Session::flash('message', 'Successfully created Project!');

        return Redirect::to('/user');

    }

    // funtion show return Array to 'project.create' in Bloodhound div, also connected to ajax.js
    public function show() {

        return User::all()->toJson();

    }
}
