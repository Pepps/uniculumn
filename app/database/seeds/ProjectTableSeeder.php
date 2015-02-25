<?php
use Faker\Factory as Faker;

class ProjectTableSeeder extends Seeder {


    public function run() {
    $faker = Faker::create();

    for ($i=0; $i < 150; $i++) {
        Project::create([
                'user_id' => $faker->numberBetween(1, DB::table('users')->count()),
                'title' => $faker->text(20),
                'body' => $faker->text(1000)
        ]);
        }
    }
}

