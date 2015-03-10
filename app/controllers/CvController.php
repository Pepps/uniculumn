<?php
class CvController extends BaseController {
    public function index($userid) {

        return View::make("cv");

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
