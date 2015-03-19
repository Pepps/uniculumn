<?php

class ExperienceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /experience
	 *
	 * @return Response
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



	/**
	 * Store a newly created resource in storage.
	 * POST /experience
	 *
	 * @return Response
	 */
	public function store()
	{
			if (Input::has('to')) {
				$duration = Input::get('from') . '-' . Input::get('to');
			} else {
				$duration = Input::get('from');
			}
		//Rules for input fields
		$validator =	Validator::make(
		array(
			'location'	 			=> Input::get('location'),
			'description'	 		=> Input::get('description'),
			'type'	 				=> Input::get('type'),
			'from' 					=> Input::get('from'),
			'to'					=> Input::get('to'),
			),
		array(
			'description' 				=> 'required|max:255',
			'type'	 					=> 'required',
			'from' 						=> 'required|max:5',
			'to'						=> 'max:5',
			//'subcategory_id'            => 'required'			
			)
		);
		//Validation
		if ($validator->fails()) {
          return Redirect::to('experience')
              ->withErrors($validator);
		}else {
			$experience = new Experience;
			$experience->location = Input::get('location');
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



	public function getcities($id) {
		$input = Input::get('option');
		$cities = DB::table('cities')->where("state_id",  "=", $id, $input )->get();

		return json_encode($cities);
	}

	public function edit($id)
	{
		// $experience = Experience::find($id);

		// return View::make('experience.index')->with('edit', $experience);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /experience/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			if (Input::has('to')) {
				$duration = Input::get('from') . '-' . Input::get('to');
			} else {							
				$duration = Input::get('from');
			}
		//Rules for input fields
		// $validator =	Validator::make(
		// array(
		// 	'location'	 			=> Input::get('location'),
		// 	'description'	 		=> Input::get('description'),
		// 	'type'	 				=> Input::get('type'),
		// 	'from' 					=> Input::get('from'),
		// 	'to'					=> Input::get('to'),
		// 	),
		// array(
		// 	'description' 				=> 'required|max:255',
		// 	'type'	 					=> 'required',
		// 	'from' 						=> 'required|max:5',
		// 	'to'						=> 'max:5',
		// 	//'subcategory_id'            => 'required'			
		// 	)
		// );
		//Validation
		// if ($validator->fails()) {
  //         return Redirect::to('experience')
  //             ->withErrors($validator);
		// }else {
			$experience = Experience::find($id);
			// dd($experience);
			$experience->location = Input::get('location');
			$experience->description = Input::get('description');
			$experience->type = Input::get('type');
			$experience->duration = $duration;
			$experience->city_id = Input::get('change-cities');
			$experience->user_id = Auth::user()->id;
			//$experience->category_id = Input::get('category');

			$experience->save();

			return Redirect::to('experience');
		//}

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /experience/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
