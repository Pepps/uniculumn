<?php
class ProjectController extends \BaseController {


	/*
		The Method resposible for redering the index file on the /prodject URL.
		It allso checks if the user is logged in or not. If the user is not logged in it returns to
		the / route. When to view is created the logged in users prodject is allso sent to the view.
	*/

	public function index(){
	    if (Auth::check()){
	  		return View::make("project.index")->with('projects',User::find(Auth::user()->id)->project);
	    }
	    else{
	        return Redirect::to('/');
	    }
	}

	/*
		The method responsible for redering the createing the view for the route /project/create
	*/
	public function create(){
      return View::make('project.create');
	}

	/*
		The method responsibble for Storing data sent from the /project/create route.
		$rules is for valedeting the data given by the form and if the validator fails
		the user is redirected to prodjects/create with the errors.
		else a prodject is created and the data is inserted in to the database.
	*/
	public function store(){
      $file = array('file' => Input::file('file'));
      $rules = array(
          'project_title'         => 'required',
          'project_body'          => 'required',
          'file'				  => '',
          'category'              => 'required',
          'subcategory_id'        => 'required'
      );
      $validator = Validator::make($file, Input::all(), $rules);
      if ($validator->fails()) {
          return Redirect::to('project/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
              echo Input::get('subcategory');
      }else{
        //$categories = explode("-", Input::get('subcategory_id'));
        $path = app_path() . "/projects/" . Auth::user()->pdir .  "/" . Input::get('project_title');
        File::makeDirectory($path);
        $name = Input::file('file')->getClientOriginalName();
        $upload = Input::file('file')->move($path, $name);

        $project = new Project;
        $project->title = Input::get('project_title');
        $project->body = Input::get('project_body');
        $project->url = $upload;
        $project->user_id = Auth::user()->id;

        $project->save();

        Project::find($project->id)->category()->attach(explode("-", Input::get('subcategory_id')));
        Session::flash('message', 'Successfully created Project!');
        return Redirect::to('project');
      }
	}

	/*
		The method responsible for redering the view for the prodject/{id} route.
		The selected prodject from the id is passed to the view.
	*/
	public function show($project_id){
			$Project = Project::find($project_id);
      return View::make('project.show')
          ->with('project', $Project)
					->with('categories', $Project->category)
					->with('user', User::find($Project->user_id));
	}

	/*
		The method responsible for redering the view for the project/{id}/edit and
		passes the selected prodject to the view.
	*/
	public function edit($id){
		return View::make('project.edit')->with('project',Project::find($id));
	}

	/*
		The method resposible for updateing the data form the project/{id}/edit
		route and redirects the user to the /prodjects route.

		This have a separate route witch is duck punched.
	*/
	public function update($id){
		$Project = Project::find($id);
		$Project->title = Input::get("project_title");
		$Project->body = Input::get("project_body");
		$Project->save();
		return Redirect::to('/project');
	}

	/*
		The method responsible for deleting the seleced prodject from the prodject/delete/{id} and
		redirectiong the user to the /prodject route. The code duse also checks if the user is logged
		in or not and if the user is not logged in the user is redirected to the /prodjects route.

		This have a separate route witch is duck punched.
	*/
	public function destroy($id){
		if(Auth::check()){
			$project = Project::find($id);
			File::deleteDirectory(app_path() . "/projects/" . Auth::user()->pdir .  "/" . $project->title);
			$project->delete();

			return Redirect::to('/project');
		}else{
			return Redirect::to('/project');
		}
	}

	public function showfiles($id){
		$project = Project::find($id);
		$user = User::find($project->user_id);

		$filepaths = File::files(app_path() . "/projects/" . $user->pdir . "/" . $project->title);
		$files = [];

		for($i = 0; $i < sizeof($filepaths); $i++){
			$f = explode("/", $filepaths[$i]);
			array_push($files, $f[sizeof($f)-1]);
			//echo "<pre>" . var_dump($f) . "</pre><br>";
		}

		//var_dump($files);

		return View::make('project.showprojects')->with('files', $files);
	}

	public function getfiles($id){

	}

	public function readfile($id){

	}

}
