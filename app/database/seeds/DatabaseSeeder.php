<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$this->call('CategoryTableSeeder');
        $this->call('UserTableSeeder');

	}

}
