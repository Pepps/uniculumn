<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        // add user using Eloquent
        $user = new User;
        $user->fname = 'Kevin';
        $user->lname = 'Tatou';
        $user->email = 'admin@localhost';
        $user->password = Hash::make('password');
        $user->token = '12345';
        $user->FBauth_token = '12345';
        $user->googleauth_token = '12345';
        $user->p_dir = Hash::make('12345/12345');  
        $user->save();
    }

}


