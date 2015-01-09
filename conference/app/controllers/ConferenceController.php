<?php

use App\Repositories\RedirectRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConferenceController extends BaseApiController
{
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
