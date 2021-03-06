<?php

use App\Repositories\RedirectRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PresenterController extends BaseApiController
{
	/**
	 * Instantiate a new UserController instance.
	 * @param RedirectRepository $redirect
	 */
	public function __construct(RedirectRepository $redirect)
	{
		$this->redirect = $redirect;
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function get($id)
	{
		try {
			$data = Presenter::findOrFail($id);
			return $this->response($data->toArray());
		} catch (ModelNotFoundException $e) {
			return $this->fail('Value ' . $id . ' is invalid for presenter id');
		} catch (\Exception $e) {
			return $this->fail('Error happened', 500);
		}
	}
}
