<?php

class Map extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'maps';

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
			'mapId'        => $this->id,
			'conferenceId' => $this->conference_id,
			'title'        => $this->title,
			'mapImageUrl'  => $this->map_image_url,
		);
	}
}
