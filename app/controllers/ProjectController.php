<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$projects = Project::all();

		return View::make("projects.index")->with('projects',$projects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/projects/create.blade.php)
        return View::make('projects.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'subname'      => 'required',
            'project_type' => 'required|numeric',
            'user_ID' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('Project/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $project = new Project;
            $project->project_title= Input::get('name');
            $project->project_body = Input::get('subname');
            $project->project_url = Input::get('project_type');
            $project->user_id = Input::get('user_ID');
            $project->save();

            // redirect
            Session::flash('message', 'Successfully created Project!');
            return Redirect::to('Project');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 // get the nerd
        $project = Project::find($id);

        // show the view and pass the nerd to it
        return View::make('nerds.show')
            ->with('nerd', $project);
	}


	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



}
