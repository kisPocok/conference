<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/',                             array('uses' => 'HomeController@index',             'as' => 'index'));
Route::get('/api',                          array('uses' => 'ApiController@index',              'as' => 'apiHome'));
Route::get('/api/conference/{id}',          array('uses' => 'ConferenceController@get',         'as' => 'apiGetConference'))->where('id', '[0-9]+');
Route::get('/api/conference/{id}/events',   array('uses' => 'EventController@getByConference',  'as' => 'apiGetEventsByConference'))->where('id', '[0-9]+');
Route::get('/api/event/{id}',               array('uses' => 'EventController@get',              'as' => 'apiGetEvent'))->where('id', '[0-9]+');
Route::get('/api/presenter/{id}',           array('uses' => 'PresenterController@get',          'as' => 'apiGetPresenter'))->where('id', '[0-9]+');

