<?php

class BaseController extends Controller
{
	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.master';

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		View::share('buildVersion', 1);

		if (!is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
	}

}
