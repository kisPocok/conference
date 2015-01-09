<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Rollback all migrations and run them all again
 *
 * $ php artisan migrate:refresh --seed
 */
class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('meta_id');
			$table->string('title', 255);
			$table->text('description')->nullable();
			$table->string('image_url', 255)->nullable();
			$table->integer('location')->nullable();
			$table->integer('presenter')->nullable();
			$table->integer('video_id')->nullable();
			$table->string('slides_url', 255)->nullable();
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->timestamps();

			$table->index('meta_id');
			$table->index('title');
			$table->index('location');
			$table->index('presenter');
			$table->index('video_id');
			$table->index('start_date');
			$table->index('end_date');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event');
	}

}
