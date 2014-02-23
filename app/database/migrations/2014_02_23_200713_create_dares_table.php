<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dares', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('charity_id')->unsigned();

			$table->string('title');
			$table->text('excerpt');

			$table->bigInteger('donation_amount')->default(0);
			$table->bigInteger('donation_quantity')->default(0);
			$table->text('embedded')->nullable();
			$table->bigInteger('hits')->unsigned()->default(0);
			$table->timestamps();
			$table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('charity_id');
            $table->foreign('charity_id')->references('id')->on('charities');
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
