<?php
use Faker\Factory as Faker;

class FakerSeeder extends Seeder {


    public function run() {

        Eloquent::unguard();

        $this->call('UserTableSeeder');
        $this->call('ProjectTableSeeder');

    }
}

