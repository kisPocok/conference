<?php


class Meta extends Eloquent
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
	protected $hidden = array();
}
