<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class BugStatusesTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();
        $statuses = array('Open','Closed','Resolved');
		foreach($statuses as $status)
		{
            BugStatus::create(array('name'=>$status));

		}
	}

}
