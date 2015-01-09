<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Redirect;

class RedirectRepository
{
	public function toIndex()
	{
		return $this->route('index');
	}

	public function toReview()
	{
		return $this->route('review');
	}

	public function toBuy()
	{
		return $this->route('buy');
	}

	private function route($routeName)
	{
		return Redirect::route($routeName);
	}
}