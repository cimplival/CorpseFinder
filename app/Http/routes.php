<?php

/*
AUTH CONTROLLER ROUTES
*/
Route::get('login',                                          ['uses' => 'Auth\AuthController@getLogin',                'as' => 'log-in']);
Route::get('register',                                       ['uses' => 'Auth\AuthController@getRegister',             'as' => 'register']);
Route::get('forgot-password',                                ['uses' => 'Auth\AuthController@getForgotPassword',       'as' => 'forgot-password']);
Route::get('logout',                                         ['uses' => 'Auth\AuthController@getLogout',               'as' => 'log-out']);
Route::post('sign-up',                                       ['uses' => 'Auth\AuthController@postRegister',            'as' => 'post-register','middleware'=> array('guest')]);
Route::post('sign-in',                                       ['uses' => 'Auth\AuthController@postLogin',               'as' => 'post-login']);
/*
DASHBOARD CONTROLLER ROUTES
*/
Route::get('dashboard',                                      ['uses' => 'DashboardController@getDashboard',            'as' =>'dashboard', 'middleware'=> 'auth:administrator']);

/*
* FILTER ROUTES
*/
Route::filter('login',                                       function(){ if(Auth::check()){ return redirect()->route('/dashboard'); } });
/*
HYMN CONTROLLER ROUTES
*/
Route::post('search',                                       ['uses' => 'QueryController@search',                       'as' => 'search']);
//Route::resource('queries', 'QueryController');

Route::get('/',                                              ['uses' => 'HymnController@getHome',                       'as' => 'home']);
Route::get('archives',                                       ['uses' => 'HymnController@getArchives']);
Route::get('archives',                                   ['uses' => 'HymnController@getArchives',                 'as' => 'categories']);
Route::get('all-deceased',                                   ['uses' => 'HymnController@getAllDeceased']);
Route::get('all-deceased',                                ['uses' => 'HymnController@getAllDeceased',                   'as' => 'all-hymns']);
Route::get('add-deceased', 										 ['uses' => 'HymnController@getAddHymn', 'middleware'=> 'auth:user']);
Route::get('add-deceased', 							     ['uses' => 'HymnController@getAddHymn', 					'as' => 'add-hymn', 'middleware'=> 'auth:user']);
Route::get('search-results',                                 ['uses' => 'HymnController@getSearchResults',              'as' => 'search-results']);
Route::post('submit-deceased',                                   ['uses' => 'HymnController@postSubmitHymn',                'as' => 'submit-hymn']);

/*
HYMN SLUG ROUTE
*/
Route::get('{slug}',                                         ['uses' => 'HymnController@showHymn']);