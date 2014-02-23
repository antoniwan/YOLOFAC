<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responses', function($table)
		{
			$table->increments('id');
			$table->integer('dare_id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			$table->text('comments');
			$table->text('video_url');
			$table->timestamps();

			$table->index('dare_id');
            $table->foreign('dare_id')->references('id')->on('dares');

            $table->index('user_id');
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
