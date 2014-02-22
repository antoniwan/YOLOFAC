<?php

use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('service_id');
			$table->string('service_name');
			$table->string('service_picture')->nullable();
			$table->timestamps();

			$table->index('user_id');
			$table->index('service_id');
            $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}