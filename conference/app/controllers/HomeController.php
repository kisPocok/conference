<?php

use App\Repositories\RedirectRepository;

class HomeController extends BaseController {

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

	public function index()
	{
		return View::make('pages.index');
	}

	public function listEvents()
	{
		$params = array(
			'eventList' => Events::orderBy('id')->get()
		);
		return View::make('pages.eventlist', $params);
	}

	public function createEvent()
	{
		$location = array_merge(array('none'), Location::orderBy('title')->lists('title', 'id'));
		$presenter = array_merge(array('none'), Presenter::orderBy('name')->lists('name', 'id'));
		$params = array(
			'conferences' => Conference::orderBy('title')->lists('title', 'id'),
			'locations'   => $location,
			'presenters'  => $presenter,
			'modelId'     => false
		);
		return View::make('pages.event', $params);
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function editEvent($id)
	{
		$location = array_merge(array('none'), Location::orderBy('title')->lists('title', 'id'));
		$presenter = array_merge(array('none'), Presenter::orderBy('name')->lists('name', 'id'));
		$params = array(
			'conferences' => Conference::orderBy('title')->lists('title', 'id'),
			'locations'   => $location,
			'presenters'  => $presenter,
			'modelId'     => $id
		);
		Former::populate(Events::find($id));
		return View::make('pages.event', $params);
	}

	/**
	 * @param int|null $id
	 * @return mixed
	 */
	public function saveEvent($id = null)
	{
		if ($id) {
			$event = Events::find($id);
			$event->meta_id = Input::get('meta_id');
			$event->title = Input::get('title');
			$event->description = Input::get('description');
			$event->image_url = Input::get('image_url');
			$event->location = (int) Input::get('location');
			$event->presenter = (int) Input::get('presenter');
			$event->video_id = (int) Input::get('video_id');
			$event->slides_url = Input::get('slides_url');
			$event->start_date = date('Y-m-d H:i:s', strtotime(Input::get('start_date')));
			$event->end_date = date('Y-m-d H:i:s', strtotime(Input::get('end_date')));
		} else {
			$params = Input::all();
			$params['id'] = null;
			$event = Events::create($params);
		}

		$event->save();
		return $this->redirect->toEditEvent($event->id);
	}
}
