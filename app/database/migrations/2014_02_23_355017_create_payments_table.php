<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function($table)
		{
			$table->increments('id');
			$table->integer('dare_id')->unsigned();
			$table->string('authorization_id');
			$table->timestamps();
			$table->index('dare_id');
            $table->foreign('dare_id')->references('id')->on('dares');
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
