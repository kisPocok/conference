<?php

use App\Repositories\RedirectRepository;

class ApiController extends BaseController
{
	/**
	 * Instantiate a new UserController instance.
	 * @param RedirectRepository $redirect
	 */
	public function __construct(RedirectRepository $redirect)
	{
		$this->redirect = $redirect;
	}

	public function index()
	{
		return View::make('pages.index');
	}
}
