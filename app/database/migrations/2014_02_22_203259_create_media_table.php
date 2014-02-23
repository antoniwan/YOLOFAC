<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medias', function($table)
		{
			$table->increments('id');
			$table->integer('dare_id')->unsigned();
			$table->string('media_url')->nullable();
			$table->text('media_meta')->nullable();
			$table->string('source')->default('yolo');
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
