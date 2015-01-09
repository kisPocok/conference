<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Rollback all migrations and run them all again
 *
 * $ php artisan migrate:refresh --seed
 */
class CreatePresenterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('presenter', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->text('description')->nullable();
			$table->string('image_url', 255)->nullable();
			$table->string('organization', 255)->nullable();
			$table->string('title', 255)->nullable();
			$table->string('twitter_account', 255)->nullable();
			$table->string('facebook_account', 255)->nullable();
			$table->string('homepage', 255)->nullable();
			$table->timestamps();

			$table->index('name');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('presenter');
	}

}
