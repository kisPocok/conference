<?php

class Events extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'event';

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
		$startTime = strtotime($this->start_date);
		$endTime = strtotime($this->end_date);
		return array(
			'eventId'         => $this->id,
			'conferenceId'    => $this->meta_id,
			'title'           => $this->title,
			'description'     => $this->description,
			'imageUrl'        => $this->image_url,
			'locationId'      => $this->location,
			'presenterId'     => $this->presenter,
			'videoId'         => $this->video_id,
			'startDateTime'   => $startTime,
			'endDateTime'     => $endTime,
			'lengthInSeconds' => $endTime - $startTime,
		);
	}
}
