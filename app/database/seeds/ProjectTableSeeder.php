<?php
use Faker\Factory as Faker;

class ProjectTableSeeder extends Seeder {


    public function run() {
    $faker = Faker::create();

    for ($i=0; $i < 50; $i++) {
        Project::create([
                'user_id' => $faker->numberBetween(1, DB::table('users')->count()),
                'project_title' => $faker->text(20),
                'project_body' => $faker->text(200)
        ]);
        }
    }
}

