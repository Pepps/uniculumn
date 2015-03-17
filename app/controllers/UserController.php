<?php
class UserController extends BaseController {
    /*
        Author : Jesper
    */

    public function index() {
        $user   = User::find(Auth::user()->id);
        if($user->city_id == null){
<<<<<<< HEAD
          return View::make('user.index')->with('user', $user)->with("nocity", true)->with('projects', User::find(Auth::user()->id)->project);
=======
          return View::make('user.index')->with('user', $user)->with("nocity", true)->with('projects', Project::find($user->id)->project);
>>>>>>> kevin
        }else{
          $city  = City::find($user->city_id);
          $state  = State::find($city->state_id);

          return View::make('user.index')->with('user', $user)->with("nocity", false)
            ->with('city', $city)->with('state', $state)
            ->with('projects', Project::find($user()->id)->project);
        }
    }

    public function get($id) {

        return User::find($id);

    }

    public function edit($id) {
        $user = User::find(Auth::user()->id);
        if($user->city_id == null){$nocity = true;}else{$nocity = false;}
        return View::make('user.edit')->with('user', User::find($id))->with("nocity", $nocity)->with("states", State::all());
    }

    public function update($id) {

        $user = User::find($id);
        $user->firstname    =   Input::get("firstname");
        $user->lastname     =   Input::get("lastname");
        $user->email        =   Input::get("email");
        $user->city_id      =   Input::get("city");
        $user->address      =   Input::get("address");
        $user->zipcode      =   Input::get("postnumber");
        $user->phone        =   Input::get("phone");
        $user->description  =   Input::get("description");
        $user->save();

        Session::flash('message', 'Successfully updated User!');

        return Redirect::to('/user');

    }

    // funtion show return Array to 'project.create' in Bloodhound div, also connected to ajax.js
    public function show() {

        return User::all()->toJson();

    }
}
