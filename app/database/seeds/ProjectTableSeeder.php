<?php
use Faker\Factory as Faker;

class ProjectTableSeeder extends Seeder {


    public function run()
    {

        $faker = Faker::create();

        for ($i = 0; $i < 150; $i++) {
            $user = User::orderByRaw("RAND()")->limit(rand(1, 14))->lists('id');
            $project = new Project;
            $project->title = $faker->text(20);
            $project->body = $faker->text(1000);
            $project->user_id = $user[0];
            $project->save();
            $project->users()->attach($user);
        }
    }
}