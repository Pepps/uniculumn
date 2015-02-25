<?php
class ProjectController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Auth::check()) {
		  return View::make("project.index")->with('projects',User::find(Auth::user()->id)->project);
        }
        else {
            return Redirect::to('/')->with();
        }
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// load the create form (app/views/projects/create.blade.php)
        return View::make('project.create');
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
            'project_title'         => 'required',
            'project_body'          => 'required',
            'category'              => 'required',
            'subcategory_id'        => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('project/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
                echo Input::get('subcategory');
        } else {

            $categories = explode("-", Input::get('subcategory_id'));
			$project = new Project;
            $project->project_title= Input::get('project_title');
            $project->project_body = Input::get('project_body');
            $project->project_url = "typ";
            $project->user_id = Auth::user()->id;
            $project->save();

            Project::find($project->id)->category()->attach($categories);
            Session::flash('message', 'Successfully created Project!');
            return Redirect::to('project');
        }
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($project_id)
	{
			$Project = Project::find($project_id);

      // show the view and pass the project to it
      return View::make('project.show')
          ->with('project', $Project)
					->with('categories', Project::find($project_id)->category)
					->with('user', User::find($Project->user_id));
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
    /**
     *
     *
     *
     */
}
