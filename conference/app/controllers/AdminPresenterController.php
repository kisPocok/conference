<?php

use App\Repositories\RedirectRepository;

class AdminPresenterController extends BaseController
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

	public function listPresenters()
	{
		$params = array(
			'list' => Presenter::orderBy('id')->get()
		);
		return View::make('pages.admin.presenterList', $params);
	}

	public function createPresenter()
	{
		return View::make('pages.admin.presenter', array('modelId' => false));
	}

	/**
	 * @param int $id
	 * @return mixed
	 */
	public function editPresenter($id)
	{
		Former::populate(Presenter::find($id));
		return View::make('pages.admin.presenter', array('modelId' => $id));
	}

	/**
	 * @param int|null $id
	 * @return mixed
	 */
	public function savePresenter($id = null)
	{
		if ($id) {
			$model = Presenter::find($id);
			$model->name = Input::get('name');
			$model->description = Input::get('description');
			$model->image_url = Input::get('image_url');
			$model->organization = Input::get('organization');
			$model->title = Input::get('title');
			$model->twitter_acccount = Input::get('twitter_acccount');
			$model->facebook_acccount = Input::get('facebook_acccount');
			$model->homepage = Input::get('homepage');
		} else {
			$params = Input::all();
			$params['id'] = null;
			$model = Presenter::create($params);
		}

		$model->save();
		return $this->redirect->toEditPresenter($model->id);
	}
}