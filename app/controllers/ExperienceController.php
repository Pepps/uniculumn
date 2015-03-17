<?php

class ExperienceController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /experience
	 *
	 * @return Response
	 */
	public function index()
	{
		$experience = User::find(Auth::user()->id)->experience;
		$category = new Category;
		$ids = [];
		foreach($experience as $value) {
			array_push($ids, $value -> city_id);
		}

	    if (Auth::check()){
	  		return View::make("experience.index")->with('experiences',$experience)->with('cities', City::findMany($ids));
	    }
	    else{
	        return Redirect::to('/');
	    }
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /experience/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('experience.create')->with("states", State::all());
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /experience
	 *
	 * @return Response
	 */
	public function store()
	{
		//dd(Input::all());
			if (Input::has('to')) {
				$duration = Input::get('from') . '-' . Input::get('to');
			} else {
				$duration = Input::get('from');
			}
		//Rules for input fields
		$validator =	Validator::make(
		array(
			'title' 				=> Input::get('title'),
			'location'	 			=> Input::get('location'),
			'description'	 		=> Input::get('description'),
			'type'	 				=> Input::get('type'),
			'from' 					=> Input::get('from'),
			'to'					=> Input::get('to'),
			),
		array(
			'title' 					=> 'required|max:100',
			'description' 				=> 'required|max:255',
			'type'	 					=> 'required',
			'from' 						=> 'required|max:5',
			'to'						=> 'max:5',
			//'subcategory_id'            => 'required'			
			)
		);

		//$validator = Validator::make(Input::all(), $rules);

		//Validation
		if ($validator->fails()) {
          return Redirect::to('experience/create')
              ->withErrors($validator);
		}else {
			$experience = new Experience;
			$experience->title = Input::get('title');
			$experience->location = Input::get('location');
			$experience->description = Input::get('description');
			$experience->type = Input::get('type');
			$experience->duration = $duration;
			$experience->city_id = Input::get('cities');
			$experience->user_id = Auth::user()->id;
			$experience->category_id = Input::get('category');

			$experience->save();

			Experience::find($experience->id)->category()->attach(explode("-", Input::get('subcategory_id')));

			return Redirect::to('experience');
		}


	}

	/**
	 * Display the specified resource.
	 * GET /experience/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		echo (User::find(Auth::User()->id)->experience);
	}

	/**
	 * Display the specified resource.
	 * GET /experience/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function newref($id) {
			return View::make('experience.newref')->with("expid", $id);

	}

	public function addref($id) {
//Rules for input fields
		
		$rules = array(
			'company' 				=> 'required',
			'firstname' 			=> 'required',
			'lastname' 				=> 'required',
			'email' 				=> 'required',
			'phone' 				=> 'required',
			);

		$validator = Validator::make(Input::all(), $rules);

		//Validation
		if ($validator->fails()) {
          return Redirect::to('experience')
              ->withErrors($validator);
		}else {
			$reference = new Reference;
			$reference->company = Input::get('company');
			$reference->firstname = Input::get('firstname');
			$reference->lastname = Input::get('lastname');
			$reference->email = Input::get('email');
			$reference->phone = Input::get('phone');
			$reference->user_id = Auth::user()->id;
			$reference->experience_id = $id;
			$reference->save();


		}
		


	}

	public function getcities($id) {
		$input = Input::get('option');
		$cities = DB::table('cities')->where("state_id",  "=", $id, $input )->get();

		return json_encode($cities);
	}
	/**
	 * Show the form for editing the specified resource.
	 * GET /experience/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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
		//
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
