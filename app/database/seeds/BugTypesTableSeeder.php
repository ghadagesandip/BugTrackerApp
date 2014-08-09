<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class BugTypesTableSeeder extends Seeder {

	public function run()
	{
		$roles = array('Bug','Change Request','New Request');

		foreach($roles as $role)
		{
			BugType::create(array('name'=>$role));
		}
	}

}
