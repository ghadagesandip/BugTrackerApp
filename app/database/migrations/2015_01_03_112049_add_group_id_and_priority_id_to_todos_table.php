<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGroupIdAndPriorityIdToTodosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('todos', function(Blueprint $table)
		{
			$table->integer('group_id');
			$table->integer('priority_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('todos', function(Blueprint $table)
		{
			$table->dropColumn('group_id');
			$table->dropColumn('priority_id');
		});
	}

}
