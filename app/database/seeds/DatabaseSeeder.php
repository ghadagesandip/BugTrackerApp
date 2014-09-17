<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		 Eloquent::unguard();
         $this->call('RolesTableSeeder');
         $this->call('UsersTableSeeder');
		 $this->call('BugTypesTableSeeder');
         $this->call('BugStatusesTableSeeder');
         $this->call('TodoStatusesTableSeeder');
         $this->command->info('Seeding roles table');
	}


}

