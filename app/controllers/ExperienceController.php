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
	    if (Auth::check()){
	  		return View::make("experience.index")->with('experiences',User::find(Auth::user()->id)->experience);
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
		return View::make('experience.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /experience
	 *
	 * @return Response
	 */
	public function store()
	{
		$cities = City::lists('id', 'name');

		//Rules for input fields
		$rules = array(
			'title' 				=> 'required',
			'description' 			=> 'required',
			'title' 				=> 'required',
			'duration' 					=> 'required'
			);

		$validator = Validator::make(Input::all(), $rules);

		//Validation
		if ($validator->fails()) {
          return Redirect::to('experience/create')
              ->withErrors($validator);
		}else {
			$experience = new Experience;
			$experience->title = Input::get('title');
			$experience->description = Input::get('description');
			$experience->duration = Input::get('duration');
			$experience->user_id = Auth::user()->id;

			$experience->save();

		}
	}

	/**
	 * Display the specified resource.
	 * GET /experience/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Display the specified resource.
	 * GET /experience/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function newref($id) {
			return View::make('experience.newref')->with("states", State::all());

	}

	public function addref($id) {

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
