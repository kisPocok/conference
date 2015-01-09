<?php

/**
 * Class DatabaseSeeder
 *
 * $ php artisan db:seed
 * $ php artisan db:seed --class
 */
class DatabaseSeeder extends Seeder
{
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

class MetaTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('meta')->delete();
		$sampleData = array(
			'id' => 1,
			'title' => 'Craft-Conf',
			'background_image_url' => null,
			'color_schema' => 'light',
			'start_date' => date("Y-m-d H:i:s", strtotime('NOW +1 HOURS')),
			'end_date' => date("Y-m-d H:i:s", strtotime('NOW +7 HOURS'))
		);
		Meta::create($sampleData);
	}
}