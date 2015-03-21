<?php
class ProjectController extends \BaseController {


	/*
		The Method resposible for redering the index file on the /prodject URL.
		It allso checks if the user is logged in or not. If the user is not logged in it returns to
		the / route. When to view is created the logged in users prodject is allso sent to the view.
	*/

	public function index(){
	    if (Auth::check()){
				return View::make("project.index")
				->with('projects',User::find(Auth::user()->id)->project);

	    }
	    else{
	        return Redirect::to('/');
	    }
	}

	/*
		The method responsible for redering the createing the view for the route /project/create
	*/
	public function create(){
      return View::make('project.create')->with('user',User::find(Auth::user()->id));
	}

	/*
		The method responsibble for Storing data sent from the /project/create route.
		$rules is for valedeting the data given by the form and if the validator fails
		the user is redirected to prodjects/create with the errors.
		else a prodject is created and the data is inserted in to the database.
	*/
	public function store(){
			/*
				 TODO Check if folder exist if so delete it
				 TODO Check if there is files if not do not try to upload files
			*/

			//dd(Input::get('category'));

      $rules = array(
          'project_title'           => 'required|unique:projects,title',
          'project_body'            => 'required',
          'category'                => 'required',
      );

      $validator = Validator::make(Input::all(), $rules);

			if ($validator->fails()) {
          return Redirect::to('project/create')->withErrors($validator);
      }else{
        $project = new Project;
        $project->title = Input::get('project_title');
        $project->body = Input::get('project_body');

        $project->owner_id = Auth::user()->id;


        $project->save();

        Project::find($project->id)->category()->attach(explode("-", Input::get('category')));

				Project::find($project->id)->users()->attach(Auth::user()->id);


				if(Input::hasfile("files")){
					$path = app_path() . "/projects/" . Auth::user()->pdir .  "/" . Input::get('project_title');
					File::makeDirectory($path);
					foreach(Input::file("files") as $file){
						$file->move($path, $file->getClientOriginalName());
					}
				}

				Session::flash('message', 'Projektet har skappats!');
				return Redirect::to('project');
      }
	}

	/*
		The method responsible for redering the view for the prodject/{id} route.
		The selected prodject from the id is passed to the view.
	*/
	public function show($project_id){
			$Project = Project::find($project_id);
			$pdir = app_path() . "/projects/" . Auth::user()->pdir;


      return View::make('project.show')
          ->with('project', $Project)
					->with('categories', $Project->category)
					->with('users', $Project->user)
					->with('projects',User::find(Auth::user()->id)->project);
	}

	/* 
		This method is responsible for enabling downloading the 
		files/projects that are shown in the show projects page.
	 */

		public function getFiles() {
				$pdir = app_path() . "/projects/" . Auth::user()->pdir;
				$files = File::allFiles($pdir);

			foreach($files as $file) {
				return Response::download($pdir, $file);
			}
		}

	/*
		The method responsible for redering the view for the project/{id}/edit and
		passes the selected prodject to the view.
	*/
	public function edit($id){
		/*
		$Project = Project::find($id);
		return View::make('project.edit')->with('project',Project::find($id))
									 ->with('users', Project::find($id)->users)
                                     ->with('user',User::find(Auth::user()->id));
	*/
		return Redirect::to('/project');
	}

	/*
		The method resposible for updateing the data form the project/{id}/edit
		route and redirects the user to the /prodjects route.

		This have a separate route witch is duck punched.
	*/
	public function update($id){
		if(Auth::check()){
			$Project = Project::find($id);
			$Project->title = Input::get("project_title");
			$Project->body = Input::get("project_body");
			$Project->save();
			return Redirect::to('/project');
		}else{
			return Redirect::to('/project');
		}
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

	public function addcolab($id){
		if(Auth::check()){
			Project::find($id)->users()->attach($user = User::where("email", "=", Input::get("collaborators-form"))->first()->id);
			return Redirect::to("/project/".$id."/edit");
		}else{
			return Redirect::to('/project');
		}
	}

	public function deletecolab($project_id, $colab_id){
		if(Auth::check()){
			DB::table('project_user')->where('user_id', '=', $colab_id)->where('project_id', '=', $project_id)->delete();
			return Redirect::to("/project/".$project_id."/edit");
		}else{
			return Redirect::to('/project');
		}
	}

	public function getcolabs($id){
		return Project::find($id)->users->toJson();
	}



}
