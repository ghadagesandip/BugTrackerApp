<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bugs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title')->unique();
			$table->text('description');
			$table->integer('bug_status_id');
			$table->integer('bug_type_id');
			$table->integer('assigned_to');
			$table->integer('assigned_by');
			$table->integer('project_id');
			$table->date('expected_close_date');
			$table->date('resolved_date');
			$table->date('close_date');
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
		Schema::drop('bugs');
	}

}
