<?php

class StateSeeder extends Seeder {

	public function run()
	{
		$states = array(
			'Stockholms län',
			'Uppsala län',
			'Södermanlands län',
			'Östergötlands län',
			'Jönköpings län',
			'Kronobergs län',
			'Kalmar län',
			'Gotlands län',
			'Blekinge län',
			'Skåne län',
			'Hallands län',
			'Västra Götalands län',
			'Värmlands län',
			'Örebro län',
			'Västmanlands län',
			'Dalarnas län',
			'Gävleborgs län',
			'Västernorrlands län',
			'Jämtlands län',
			'Västerbottens län',
			'Norrbottens län'
			);

	for($i = 0; $i < sizeof($states); $i++) {
		State::create([
			'name' => $states[$i]
			]);
	}

	}

}
