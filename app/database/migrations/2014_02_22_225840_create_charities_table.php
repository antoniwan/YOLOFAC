<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('charities', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('url')->nullable();
			$table->string('type')->nullable();
			$table->string('category')->nullable();
			$table->string('contact_email')->nullable();
			$table->string('media')->nullable();
			$table->string('status')->nullable();
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
		//
	}

}
