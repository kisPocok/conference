<?php

class Location extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'location';

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
			'locationId'  => $this->id,
			'title'       => $this->title,
			'description' => $this->description,
			'mapImageUrl' => $this->map_image_url,
			'channelId'   => $this->channel_id,
		);
	}
}
