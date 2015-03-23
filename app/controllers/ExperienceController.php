<?php

class ExperienceController extends \BaseController {

	/*
		This method is responsible for defining the different variables in the /experience/index.blade.php view.
		That are then looped out in the view in order to get specific data from the database.
		variables are experiences, cities, user and states.

	*/
	public function index()
	{
	    if (Auth::check()){
	   	$experience = User::find(Auth::user()->id)->experience;
		$category = new Category;
		$ids = [];
		foreach($experience as $value) {
			array_push($ids, $value -> city_id);
		}

	  		return View::make("experience.index")
	  		->with('experiences', $experience)
	  		->with('cities', City::findMany($ids))
	  		->with('user',User::find(Auth::user()->id))
	  		->with("states", State::all());
	    }
	    else{
	        return Redirect::to('/');
	    }
	}



	/*
		This method is responsible for adding the input field data into the database.
		Whenever an experience is created, it will go through this method, first the validator
		and then "store" the inputs if the validation goes through.
	*/
	public function store()
	{
			if (Input::has('to')) {
				$duration = Input::get('from') . '-' . Input::get('to');
			} else {
				$duration = Input::get('from');
			}

			if (Input::has('location')) {
				$location = Input::get('location') . '-' . Input::get('title');
			} else {
				$location = Input::get('location');
			}
		//Rules for input fields
		$validator =	Validator::make(
		array(
			'location'	 			=> Input::get('location'),
			'title'					=> Input::get('title'),
			'description'	 		=> Input::get('description'),
			'type'	 				=> Input::get('type'),
			'from' 					=> Input::get('from'),
			'to'					=> Input::get('to'),
			'cities'					=> Input::get('cities')

			),
		array(
			'location' 					=> 'required',
			'title'	 					=> 'required',
			'description' 				=> 'required|max:255',
			'type'	 					=> 'required',
			'from' 						=> 'required|max:5',
			'to'						=> 'max:5',
			'cities'					=> 'required',
			//'subcategory_id'            => 'required'
			)
		);
		//Validation
		if ($validator->fails()) {
          return Redirect::to('experience')
              ->withErrors($validator);
		}else {
			$experience = new Experience;
			$experience->location = $location;
			$experience->description = Input::get('description');
			$experience->type = Input::get('type');
			$experience->duration = $duration;
			$experience->city_id = Input::get('cities');
			$experience->user_id = Auth::user()->id;
			$experience->category_id = Input::get('category');

			$experience->save();
			return Redirect::to('experience');
		}

	}

	//Delete the experiences
	public function deleteExp($id) {
		$experience = Experience::find($id);
		$experience->delete();

		Session::flash('message', 'Successfully deleted Experience');
		return Redirect::to('experience');
	}


	/*
		This method is responsible for getting all the cities via the states.
	*/
	public function getcities($id) {
		$input = Input::get('option');
		$cities = DB::table('cities')->where("state_id",  "=", $id, $input )->get();

		return json_encode($cities);
	}

	/*
		This method is responsible for editing of the experiences
	*/

	public function update($id)
	{
			if (Input::has('to')) {
				$duration = Input::get('from') . '-' . Input::get('to');
			} else {
				$duration = Input::get('from');
			}
			$experience = Experience::find($id);
			$experience->location = Input::get('location');
			$experience->description = Input::get('description');
			$experience->type = Input::get('type');
			$experience->duration = $duration;
			$experience->city_id = Input::get('change-cities');
			$experience->user_id = Auth::user()->id;


			$experience->save();

			return Redirect::to('experience');
		//}

	}

}
