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
		$rules = array(
			'title' 				=> 'required',
			'description' 			=> 'required',
			'title' 				=> 'required',
			'from' 					=> 'required',
			'to' 					=> 'required',
			'company' 				=> 'required',
			'firstname' 			=> 'required',
			'lastname' 				=> 'required',
			'email' 				=> 'required',
			'phone' 				=> 'required'
			);
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
		//
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