<?php
class CvController extends BaseController {

    /*
       This controller duse just make the view for CVs and retrives the nessesary
       data for rendering a CV.
    */
    public function index($userid) {

        return View::make("cv")
               ->with("user", User::find($userid))
               ->with("city", City::find(User::find($userid)->city_id))
               ->with("exps", User::find($userid)->experience)
               ->with("projects", User::find($userid)->project)
               ->with("reffs", User::find($userid)->reference);

    }

}
