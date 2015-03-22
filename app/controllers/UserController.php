<?php
class UserController extends BaseController {
    /*
        Author : Jesper
    */

    public function index($id) {

        $user = User::find($id);

        if($user->city_id == null){
          return View::make('user.index')->with('user', $user)->with("city", null)->with('projects', $user->project)
                            ->with('usedcategories', $user->categories)
                            ->with('experience', $user->experience);
        }else{
          $city  = City::find($user->city_id);
          $state  = State::find($city->state_id);

          return View::make('user.index')->with('user', $user)->with("nocity", false)
            ->with('city', $city)->with('state', $state)
            ->with('projects', $user->project)
            ->with('usedcategories', $user->categories)
            ->with('experience', $user->experience);
        }
    }

    public function get($id) {

        return User::find($id);

    }

    public function edit($id) {
        $user = User::find(Auth::user()->id);
        if($user->city_id == null){$nocity = true;}else{$nocity = false;}

        return View::make('user.edit')->with('user', User::find($id))
                                      ->with("nocity", $nocity)
                                      ->with("states", State::all())
                                      ->with("cities", City::all())
                                      ->with('usedcategories', $user->categories);
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

        return Redirect::to('/user/'. $id .'/edit');
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

        $user = Auth::user()->id;
        User::find($user)->categories()->attach(Input::get('subcategories'));
        return Redirect::to("/user/".Auth::user()->id."/edit");

    }

    public function delete_interest($category_id){
        if(Auth::check()){
            DB::table('interests')->where('user_id', '=', Auth::user()->id)->where('category_id', '=', $category_id)->delete();
            return Redirect::to("/user/".Auth::user()->id."/edit");
        }else{
            return Redirect::to('/user');
        }
    }

    // funtion show return Array to 'project.create' in Bloodhound div, also connected to ajax.js
    public function show() {

        return User::all()->toJson();

    }

    /* Filip made this for searching after users */
    public function search($searchkey) {

      $emailvalidator = Validator::make(array('email' => $searchkey),array('email' => 'required|email|unique:users'));
      //$firstvalidator = Validator::make(array('firstname' => $searchkey),array('firstname' => 'required|unique:users'));
      //$lastvalidator = Validator::make(array('lastname' => $searchkey),array('lastname' => 'required|unique:users'));

      if($emailvalidator->fails()){
        return User::where("email", "=", $searchkey)->first()->toJson();
      }else{
        return "No value in the Database";
      }

    }
}
