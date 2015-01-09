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
		$this->call('LocationTableSeeder');
		$this->call('MapTableSeeder');
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
		Conference::create($sampleData);

		$sampleData = array(
			'id' => 2,
			'title' => 'Sziget fesztivál',
			'background_image_url' => null,
			'color_schema' => 'light',
			'start_date' => date("Y-m-d H:i:s", strtotime('NOW +1 HOURS')),
			'end_date' => date("Y-m-d H:i:s", strtotime('NOW +7 HOURS'))
		);
		Conference::create($sampleData);
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
			'location' => 1,
			'presenter' => 1,
			'video_id' => 1234567,
			'start_date' => date("Y-m-d H:i:s", strtotime('NOW +1 HOURS')),
			'end_date' => date("Y-m-d H:i:s", strtotime('NOW +2 HOURS'))
		);
		Events::create($sampleData);

		$sampleData = array(
			'id' => 2,
			'meta_id' => 2,
			'title' => 'Nyitóbuli',
			'description' => null,
			'image_url' => null,
			'location' => 3,
			'presenter' => 1,
			'video_id' => 1234567,
			'start_date' => date("Y-m-d H:i:s", strtotime('NOW +1 HOURS')),
			'end_date' => date("Y-m-d H:i:s", strtotime('NOW +2 HOURS'))
		);
		Events::create($sampleData);

		$sampleData = array(
			'id' => 3,
			'meta_id' => 2,
			'title' => 'Záróbuli',
			'description' => null,
			'image_url' => null,
			'location' => 2,
			'presenter' => 1,
			'video_id' => 1234567,
			'start_date' => date("Y-m-d H:i:s", strtotime('NOW +3 HOURS')),
			'end_date' => date("Y-m-d H:i:s", strtotime('NOW +4 HOURS'))
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

		$sampleData = array(
			'id' => 2,
			'name' => 'Julia Carpenter',
			'description' => 'Starting from 1989 onwards, I was obsessed and fully dedicated to become a professional tennis player with the full support of my family. Next to a rigorous tennis schedule I also managed to finish school with good results.',
			'image_url' => 'http://www.zeneszoveg.hu/img/julia_carpenter.jpg',
			'organization' => 'Musician/Band',
			'title' => 'JULIA CARPENTER',
			'facebook_account' => 'djjuliacarpenter',
			'twitter_account' => 'djjuliacarpenter',
			'homepage' => 'http://soundcloud.com/juliacarpenter',
		);
		Presenter::create($sampleData);
	}
}

class LocationTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('location')->delete();
		$sampleData = array(
			'id' => 1,
			'conference_id' => 1,
			'title' => 'Bálna 1. emelete',
			'description' => null,
			'map_image_url' => 'http://www.balnabudapest.hu/map/1em.png',
			'channel_id' => 200001,
		);
		Location::create($sampleData);

		$sampleData = array(
			'id' => 2,
			'conference_id' => 2,
			'title' => 'Bálna 2. emelete',
			'description' => null,
			'map_image_url' => 'http://www.balnabudapest.hu/map/2em.png',
			'channel_id' => 200002,
		);
		Location::create($sampleData);

		$sampleData = array(
			'id' => 3,
			'conference_id' => 2,
			'title' => 'Bálna 3. emelete',
			'description' => null,
			'map_image_url' => 'http://www.balnabudapest.hu/map/3em.png',
			'channel_id' => 200003,
		);
		Location::create($sampleData);
	}
}

class MapTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('maps')->delete();
		$sampleData = array(
			'id' => 1,
			'conference_id' => 1,
			'title' => 'Bálna 1. emelete',
			'map_image_url' => 'http://www.balnabudapest.hu/map/1em.png'
		);
		Map::create($sampleData);

		$sampleData = array(
			'id' => 2,
			'conference_id' => 2,
			'title' => 'Bálna 2. emelete',
			'map_image_url' => 'http://www.balnabudapest.hu/map/2em.png',
		);
		Map::create($sampleData);

		$sampleData = array(
			'id' => 3,
			'conference_id' => 2,
			'title' => 'Bálna 3. emelete',
			'map_image_url' => 'http://www.balnabudapest.hu/map/3em.png',
		);
		Map::create($sampleData);
	}
}