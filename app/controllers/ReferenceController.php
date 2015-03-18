<?php

class ReferenceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reference
	 *
	 * @return Response
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

	/**
	 * Show the form for creating a new resource.
	 * GET /reference/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reference
	 *
	 * @return Response
	 */
	public function store($id)
	{
//Rules for input fields
		
		$rules = array(
			'firstname' 			=> 'required',
			'lastname' 				=> 'required',
			'email' 				=> 'required',
			'phone' 				=> 'required',
			);

		$validator = Validator::make(Input::all(), $rules);
	   	$experience = new Experience;
		//Validation
		if ($validator->fails()) {
          return Redirect::to('experience')
              ->withErrors($validator);
		}else {
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

	/**
	 * Display the specified resource.
	 * GET /reference/{id}
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
	 * GET /reference/{id}/edit
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
	 * PUT /reference/{id}
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
	 * DELETE /reference/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}