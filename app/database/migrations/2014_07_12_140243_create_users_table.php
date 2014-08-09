<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->engine ="InnoDB";
            $table->collation ="utf8_general_ci";
			$table->bigIncrements('id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('first_name', 250);
			$table->string('last_name', 250);
			$table->string('username', 250)->unique();
			$table->string('password', 250);
			$table->string('email', 250)->unique();
			$table->string('gender')->default('Male');
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
		Schema::drop('users');
	}

}
