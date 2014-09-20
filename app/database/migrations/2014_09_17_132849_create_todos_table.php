<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('todos',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('title','200');
            $table->text('description');
            $table->integer('user_id');
            $table->integer('project_id');
            $table->date('date');
            $table->integer('todo_status');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('todos');
	}

}
