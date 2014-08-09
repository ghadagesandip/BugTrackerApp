<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBugTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bug_types', function(Blueprint $table)
		{
            $table->engine ="InnoDB";
            $table->collation ="utf8_general_ci";
			$table->increments('id')->unsigned();
            $table->string('name',200)->unique();
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
		Schema::drop('bug_types');
	}

}
