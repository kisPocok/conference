<?php

class Conference extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'meta';

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
			'conferenceId'       => $this->id,
			'title'              => $this->title,
			'backgroundImageUrl' => $this->background_image_url,
			'colorSchema'        => $this->color_schema,
			'startDateTime'      => $startTime,
			'endDateTime'        => $endTime,
			'lengthInSeconds'    => $endTime - $startTime,
		);
	}
}
