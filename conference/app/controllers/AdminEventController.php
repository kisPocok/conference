<?php

use App\Repositories\RedirectRepository;

class AdminEventController extends BaseController
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
			'eventList' => Events::orderBy('id')->get()
		);
		return View::make('pages.eventlist', $params);
	}

	public function create()
	{
		return View::make('pages.event', $this->getParams());
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function edit($id)
	{
		Former::populate(Events::find($id));
		return View::make('pages.event', $this->getParams($id));
	}

	/**
	 * @param int|null $id
	 * @return mixed
	 */
	public function save($id = null)
	{
		if ($id) {
			$model = Events::find($id);
			$model->meta_id = Input::get('meta_id');
			$model->title = Input::get('title');
			$model->description = Input::get('description');
			$model->image_url = Input::get('image_url');
			$model->location = (int) Input::get('location');
			$model->presenter = (int) Input::get('presenter');
			$model->video_id = (int) Input::get('video_id');
			$model->slides_url = Input::get('slides_url');
			$model->start_date = date('Y-m-d H:i:s', strtotime(Input::get('start_date')));
			$model->end_date = date('Y-m-d H:i:s', strtotime(Input::get('end_date')));
		} else {
			$params = Input::all();
			$params['id'] = null;
			$model = Events::create($params);
		}

		$model->save();
		return $this->redirect->toEditEvent($model->id);
	}

	/**
	 * @param bool|int $id
	 * @return array
	 */
	private function getParams($id = false)
	{
		$location = array_merge(array('none'), Location::orderBy('title')->lists('title', 'id'));
		$presenter = array_merge(array('none'), Presenter::orderBy('name')->lists('name', 'id'));
		$params = array(
			'conferences' => Conference::orderBy('title')->lists('title', 'id'),
			'locations'   => $location,
			'presenters'  => $presenter,
			'modelId'     => false
		);
		return $params;
	}

}
