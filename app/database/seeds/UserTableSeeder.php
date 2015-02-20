<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {

        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) {
            User::create(['fname' => $faker->firstName, 
                          'lname' => $faker->lastName, 
                          'email' => $faker->email, 
                          'password' => Hash::make('secret'), 
                          'token' => $faker->numberBetween($min = 1000, $max = 9000), 
                          'FBauth_token' => $faker->numberBetween($min = 1000, $max = 9000), 
                          'googleauth_token' => $faker->numberBetween($min = 1000, $max = 9000), 
                          'p_dir' => Hash::make('secret')
                          ]);
        }
	}

}