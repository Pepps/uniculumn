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
		return View::make("project.index")->with('projects',$projects);
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
            'subcategory_id'        => 'required',
            'user_id'               => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('project/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
                echo Input::get('subcategory');
        } else {
            // store
            $categories = explode("-", Input::get('subcategory_id'));
            $project = new Project;
            $project->title= Input::get('project_title');
            $project->body = Input::get('project_body');
            $project->url = "typ";
            $project->user_id = Input::get('user_id', false);
        //    $project->category->add($category);
            $project->save();
            Project::find($project->id)->category()->attach($categories);
        //$project->category()->attach($categories[0]);
            // redirect
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
		 // get the project
        // show the view and pass the project to it
        return View::make('Project.show')
            ->with('project', Project::find($project_id))->with('categories', Project::find($project_id)->category);
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