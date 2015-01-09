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

// Empty Doc Root
Route::get('/',                              array('uses' => 'HomeController@index',                 'as' => 'index'));

// Api
Route::get('/api',                           array('uses' => 'ApiController@index',                  'as' => 'apiHome'));
Route::get('/api/conference/{id}',           array('uses' => 'ConferenceController@get',             'as' => 'apiGetConference'))->where('id', '[0-9]+');
Route::get('/api/conference/{id}/events',    array('uses' => 'EventController@getByConference',      'as' => 'apiGetEventsByConference'))->where('id', '[0-9]+');
Route::get('/api/conference/{id}/locations', array('uses' => 'LocationController@getByConference',   'as' => 'apiGetLocationsByConference'))->where('id', '[0-9]+');
Route::get('/api/conference/{id}/maps',      array('uses' => 'MapController@getByConference',        'as' => 'apiGetMapsByConference'))->where('id', '[0-9]+');
Route::get('/api/event/{id}',                array('uses' => 'EventController@get',                  'as' => 'apiGetEvent'))->where('id', '[0-9]+');
Route::get('/api/presenter/{id}',            array('uses' => 'PresenterController@get',              'as' => 'apiGetPresenter'))->where('id', '[0-9]+');
Route::get('/api/location/{id}',             array('uses' => 'LocationController@get',               'as' => 'apiGetLocation'))->where('id', '[0-9]+');
Route::get('/api/map/{id}',                  array('uses' => 'MapController@get',                    'as' => 'apiGetMap'))->where('id', '[0-9]+');

// Events
Route::get('/admin/events',                  array('uses' => 'AdminEventController@lister',          'as' => 'eventList'));
Route::get('/admin/event',                   array('uses' => 'AdminEventController@create',          'as' => 'createEventPage'));
Route::get('/admin/event/{id}',              array('uses' => 'AdminEventController@edit',            'as' => 'editEventPage'));
Route::post('/admin/event',                  array('uses' => 'AdminEventController@save',            'as' => 'createEvent'));
Route::post('/admin/event/{id}',             array('uses' => 'AdminEventController@save',            'as' => 'saveEvent'));

// Presenters
Route::get('/admin/presenters',              array('uses' => 'AdminPresenterController@listPresenters',       'as' => 'presenterList'));
Route::get('/admin/presenter',               array('uses' => 'AdminPresenterController@createPresenter',      'as' => 'createPresenterPage'));
Route::get('/admin/presenter/{id}',          array('uses' => 'AdminPresenterController@editPresenter',        'as' => 'editPresenterPage'));
Route::post('/admin/presenter',              array('uses' => 'AdminPresenterController@savePresenter',        'as' => 'createPresenter'));
Route::post('/admin/presenter/{id}',         array('uses' => 'AdminPresenterController@savePresenter',        'as' => 'savePresenter'));

// Location
Route::get('/admin/locations',              array('uses' => 'AdminLocationController@lister',       'as' => 'locationList'));
Route::get('/admin/location',               array('uses' => 'AdminLocationController@create',       'as' => 'createLocationPage'));
Route::get('/admin/location/{id}',          array('uses' => 'AdminLocationController@edit',         'as' => 'editLocationPage'));
Route::post('/admin/location',              array('uses' => 'AdminLocationController@save',         'as' => 'createLocation'));
Route::post('/admin/location/{id}',         array('uses' => 'AdminLocationController@save',         'as' => 'saveLocation'));