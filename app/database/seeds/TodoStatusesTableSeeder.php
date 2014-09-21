<?php

class TodoStatusesTableSeeder extends Seeder{

    public function run(){
        $todoStatuses = ['Complete','Pending'];

        foreach($todoStatuses as $todo){
            TodoStatus::create(array('name'=>$todo));
        }
    }
}