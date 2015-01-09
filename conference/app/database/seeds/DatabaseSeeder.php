<?php

/**
 * Class DatabaseSeeder
 *
 * $ php artisan db:seed
 * $ php artisan db:seed --class
 */
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('MetaTableSeeder');
	}
}

class MetaTableSeeder extends Seeder {

	public function run()
	{
		DB::table('meta')->delete();
		User::create(array('id' => 1, 'email' => 'admin@local.dev'));
		User::create(array('id' => 2, 'email' => 'david@local.dev'));
	}

}