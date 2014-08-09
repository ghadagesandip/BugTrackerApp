<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
        $roles = array('Admin','Manager','Programmer');

		foreach($roles as $role)
		{
			Role::create(array('name'=>$role));
		}
	}

}
