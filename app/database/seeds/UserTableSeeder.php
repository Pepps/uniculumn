<?php
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {


    public function run() {

    $faker = Faker::create();

    for ($i=0; $i < 10; $i++) {
        User::create(['firstname' => $faker->firstName,
                      'lastname' => $faker->lastName,
                      'email' => $faker->email,
                      'password' => Hash::make('secret'),
                      'token' => $faker->numberBetween($min = 1000, $max = 9000),
                      'FBtoken' => $faker->numberBetween($min = 1000, $max = 9000),
                      'googletoken' => $faker->numberBetween($min = 1000, $max = 9000),
                      'pdir' => Hash::make('secret')
                      ]);
        }
    }
}
