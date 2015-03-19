<?php
class UserController extends BaseController {
    /*
        Author : Jesper
    */

    public function index() {
        dd(User::find(Auth::user()->id)->interests);
        $user   = User::find(Auth::user()->id);
        if($user->city_id == null){
          return View::make('user.index')->with('user', $user)->with("nocity", true)->with('projects', User::find(Auth::user())->project);
        }else{
          $city  = City::find($user->city_id);
          $state  = State::find($city->state_id);

          return View::make('user.index')->with('user', $user)->with("nocity", false)
            ->with('city', $city)->with('state', $state)
            ->with('projects', User::find(Auth::user()->id)->project);
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
        $user->save();

        Session::flash('message', 'Successfully updated User!');

        return Redirect::to('/user');
    }

    public function update_password($id) {

        $validator = Validator::make(
          array(
              'password' => Input::get('new_password'),
              'Passwordconfirm' =>Input::get('new_password_confirm')
          ),
          array(
              'password' => 'required|min:6|max:20',
              'Passwordconfirm' => 'same:password'
          )
        );
        if ($validator->fails()) {
             return Redirect::to('/user')->withErrors($validator);
        }
        else {
            $user = User::find($id);
            $password = Input::get("old_password");

                if (Auth::attempt(array('password' => $password))){
                    $user->password    =   Hash::make(Input::get("new_password"));
                    $user->save();
                    Session::flash('message', 'Successfully updated User!');
                    return Redirect::intended('user');
                }
        }
    }

    public function update_description($id) {

        $user = User::find($id);
        $user->description    =   Input::get("description");
        $user->save();

        return Redirect::to('/user');

    }

    public function update_interest() {

        $interest = new Interest;
        $interest->category_id = Input::get('subcategories');
        $interest->user_id = Auth::user()->id;
        $interest->save();
    }

    // funtion show return Array to 'project.create' in Bloodhound div, also connected to ajax.js
    public function show() {

        return User::all()->toJson();

    }
}
