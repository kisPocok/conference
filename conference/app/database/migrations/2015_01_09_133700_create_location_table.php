<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Rollback all migrations and run them all again
 *
 * $ php artisan migrate:refresh --seed
 */
class CreateLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('meta_id');
			$table->string('title', 255);
			$table->text('description')->nullable();
			$table->string('map_image_url', 255)->nullable();
			$table->integer('channel_id')->nullable();
			$table->timestamps();

			$table->index('title');
			$table->index('meta_id');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location');
	}

}
