<?php

class ReferenceController extends \BaseController {
    /*
        Author : Kevin
    */

	/*
		This method is responsible for defining the different variables in the /experience/index.blade.php view.
		That are then looped out in the view in order to get specific data from the database. 
		variables are references.
	*/
	public function index()
	{
 		if (Auth::check()){

	  		return View::make("experience.index")->with('references', User::find(Auth::user()->id)->reference);
	    }
	    else{
	        return Redirect::to('/');
	    }

	}


	/*
		This method is responsible for adding the input field data into the database. 
		Whenever an referene is created, it will go through this method, first the validator 
		and then "store" the inputs if the validation goes through. 
	*/
	public function store($id)
	{
//Rules for input fields
		
		$rules = array(
			'firstname' 			=> 'required',
			'lastname' 				=> 'required',
			'email' 				=> 'required|email',
			'phone' 				=> 'required|digits_between:10,10',
			);

		$validator = Validator::make(Input::all(), $rules);
	   	$experience = new Experience;
		//Validation
		if ($validator->fails()) {
          return Redirect::to('experience')
              ->withErrors($validator);
		}else {
			//Else if validation does not fail input goes into database
			$reference = new Reference;
			$reference->firstname = Input::get('firstname');
			$reference->lastname = Input::get('lastname');
			$reference->email = Input::get('email');
			$reference->phone = Input::get('phone');
			$reference->user_id = Auth::user()->id;
			$reference->experience_id = $id;
			$reference->save();
			return Redirect::to('experience');
		}



	}
	// Delete the reference
	public function destroy($id)
	{
		$reference = Reference::find($id);
		$reference->delete();

		Session::flash('message', 'Successfully deleted Reference');
		return Redirect::to('experience');
	}

}