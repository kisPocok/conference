<?php

class Presenter extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'presenter';

	/**
	 * This attributes may not be mass assigned.
	 * All other attributes will be mass assignable
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at', 'updated_at');

	/**
	 * @return array
	 */
	public function toArray()
	{
		return array(
			'name'                => $this->name,
			'description'         => $this->description,
			'imageUrl'            => $this->image_url,
			'organization'        => $this->organization,
			'twitterAccountName'  => $this->twitter_account,
			'facebookAccountName' => $this->facebook_account,
			'homepage'            => $this->homepage,
		);
	}
}
