<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class TodoGroupsTableSeeder extends Seeder {

	public function run()
	{

        $groups =array('Inbox','Personal','Work','Errand','shopping','Movies to watch');
        foreach($groups as $group){
            TodoGroup::create(array('name'=>$group));
        }
	}

}
