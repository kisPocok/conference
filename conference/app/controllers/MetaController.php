<?php

use App\Repositories\RedirectRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MetaController extends BaseApiController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * Instantiate a new UserController instance.
	 * @param RedirectRepository $redirect
	 */
	public function __construct(RedirectRepository $redirect)
	{
		$this->redirect = $redirect;
	}

	public function get($id)
	{
		try {
			$data = Meta::findOrFail($id);
			return $this->response($data->toArray());
		} catch (ModelNotFoundException $e) {
			return $this->fail('Value ' . $id . ' is invalid for meta id');
		} catch (\Exception $e) {
			return $this->fail('Error happened', 500);
		}
	}
}
