<?php
class UserTableSeeder extends Seeder {
        // add user using Eloquent
        $user = new User;
        $user->email = 'admin@localhost';
        $user->password = Hash::make('password');
        $user->save();

	}

}
