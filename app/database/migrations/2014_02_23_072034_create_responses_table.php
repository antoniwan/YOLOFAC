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
			$table->integer('dare_id')->unsigned()->nullable();
			$table->text('comments');
			$table->text('video_url');
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
