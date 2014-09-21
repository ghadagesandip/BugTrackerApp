<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 2) as $index)
		{
			User::create([
                'role_id' =>1,
                'username'=>$faker->userName,
                'password'=>Hash::make('sandip'),
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'email'=>$faker->email,
                'gender'=>'male'
			]);
		}
	}

}
