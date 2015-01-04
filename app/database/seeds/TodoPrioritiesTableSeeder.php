<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class TodoPrioritiesTableSeeder extends Seeder {

	public function run()
	{

        $priorities = array('Priority 1','Priority 2','Priority 3','Priority 4');

		foreach($priorities as $priority)
		{
			TodoPriority::create(array('name'=>$priority));
		}
	}

}
