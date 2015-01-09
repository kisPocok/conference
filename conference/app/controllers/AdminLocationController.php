<?php

use App\Repositories\RedirectRepository;

class AdminLocationController extends BaseController
{
	/**
	 * @var RedirectRepository
	 */
	private $redirect;

	/**
	 * Instantiate a new UserController instance.
	 * @param RedirectRepository $redirect
	 */
	public function __construct(RedirectRepository $redirect)
	{
		$this->redirect = $redirect;
	}

	public function lister()
	{
		$params = array(
			'list' => Location::orderBy('id')->get()
		);
		return View::make('pages.admin.locationList', $params);
	}

	public function create()
	{
		return View::make('pages.admin.location', $this->getParams());
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function edit($id)
	{
		Former::populate(Presenter::find($id));
		return View::make('pages.admin.location', $this->getParams($id));
	}

	/**
	 * @param int|null $id
	 * @return mixed
	 */
	public function save($id = null)
	{
		if ($id) {
			$model = Location::find($id);
			$model->conference_id = (int) Input::get('conference_id');
			$model->title = Input::get('title');
			$model->description = Input::get('description');
			$model->map_image_url = Input::get('map_image_url');
			$model->channel_id = (int) Input::get('channel_id');
		} else {
			$params = Input::all();
			$params['id'] = null;
			$model = Presenter::create($params);
		}

		$model->save();
		return $this->redirect->toEditPresenter($model->id);
	}

	/**
	 * @param int|bool $id
	 * @return array
	 */
	private function getParams($id = false)
	{
		$params = array(
			'conferences' => Conference::orderBy('title')->lists('title', 'id'),
			'modelId' => $id
		);
		return $params;
	}
}