<?php

return array(
	//'default' => 'sqlite', // TODO sqlite driver telepitese, ezzel gyorsabb lenne!
	'connections' => array(
		'sqlite' => array(
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		),
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'scotchbox_test',
			'username'  => 'root',
			'password'  => 'root',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
	)
);
