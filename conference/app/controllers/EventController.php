<?php

use App\Repositories\RedirectRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventController extends BaseApiController
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
			$data = Events::findOrFail($id);
			return $this->response($data->toArray());
		} catch (ModelNotFoundException $e) {
			return $this->fail('Value ' . $id . ' is invalid for event id');
		} catch (\Exception $e) {
			return $this->fail('Error happened', 500);
		}
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function getByConference($id)
	{
		try {
			$list = Events::where('meta_id', '=', $id);
			$data = array();
			foreach ($list->get() as $model) {
				$data[] = $model->toArray();
			}
			return $this->responseWithCount($list->count(), $data);
		} catch (\Exception $e) {
			return $this->fail('Error happened', 500);
		}
	}
}
