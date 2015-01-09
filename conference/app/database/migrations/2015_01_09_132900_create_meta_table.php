<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Rollback all migrations and run them all again
 *
 * $ php artisan migrate:refresh --seed
 */
class CreateMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meta', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('background_image_url', 255)->nullable();
			$table->string('color_scheme', 10)->default('light');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->timestamps();

			$table->index('start_date');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meta');
	}

}
