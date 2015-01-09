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
		$this->call('EventTableSeeder');
		$this->call('PresenterTableSeeder');
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

class EventTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('event')->delete();
		$sampleData = array(
			'id' => 1,
			'meta_id' => 1,
			'title' => 'Craft-Conf',
			'description' => null,
			'image_url' => null,
			'location' => null,
			'presenter' => 1,
			'video_id' => 1234567,
			'start_date' => date("Y-m-d H:i:s", strtotime('NOW +1 HOURS')),
			'end_date' => date("Y-m-d H:i:s", strtotime('NOW +2 HOURS'))
		);
		Events::create($sampleData);
	}
}

class PresenterTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('presenter')->delete();
		$sampleData = array(
			'id' => 1,
			'name' => 'Johnnie Walker',
			'description' => 'Üdvözlünk a Johnnie Walker, a világ első számú skót whisky-jének hivatalos magyarországi Facebook oldalán. Keep Walking.',
			'image_url' => 'https://scontent-b.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/1524954_602720786472767_1205441468_n.png?oh=d3ad30dc3400389dfaba440d532853eb&oe=55286B9A',
			'organization' => 'Drink Co Inc.',
			'title' => 'Head of Heaven',
			'facebook_account' => 'JohnnieWalkerHungary',
			'twitter_account' => 'JohnnieWalkerHungary',
			'homepage' => 'http://www.johnniewalker.com/',
		);
		Presenter::create($sampleData);
	}
}