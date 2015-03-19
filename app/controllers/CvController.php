<?php
class CvController extends BaseController {
    public function index($userid) {

        return View::make("cv2")
               ->with("user", User::find($userid))
               ->with("city", City::find(User::find($userid)->city_id))
               ->with("exps", User::find($userid)->experience)
               ->with("projects", User::find($userid)->project);

    }

    public function test($id,$useremail) {

        $emails = explode("-",$useremail);
        $users = Project::find($id)->users;
        //echo $useremail;
        foreach($users as $user){
          foreach($emails as $email){
            if($email == $user->email){
              //var_dump($user);
              echo "<pre>" . $user->toJson() . "</pre><br>";
            }
          }
          //echo "<span>" . $user->email ."</span><br>";
        }

    }

}
