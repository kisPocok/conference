<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Redirect;

class RedirectRepository
{
	/**
	 * @param int $id
	 * @return mixed
	 */
	public function toEditEvent($id)
	{
		return $this->route('editEventPage', array('id' => $id));
	}

	private function route($routeName, $params = array())
	{
		return Redirect::route($routeName, $params);
	}
}