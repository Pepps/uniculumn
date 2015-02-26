<?php
class UserController extends BaseController {
    /*
        Author : Jesper
    */
    public function show() {
        $users = DB::table('users')->get();

        return json_encode($users);
    }
}
