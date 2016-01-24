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
Route::get('dashboard',                                      ['uses' => 'DashboardController@getDashboard', 'as' =>'dashboard', 'middleware'=> 'auth:administrator']);

/*
* FILTER ROUTES
*/
Route::filter('login',                                       function(){ if(Auth::check()){ return redirect()->route('/dashboard'); } });
/*
HYMN CONTROLLER ROUTES
*/
Route::get('/',                                              ['uses' => 'HymnController@getHome',                       'as' => 'home']);
Route::get('categories',                                     ['uses' => 'HymnController@getCategories']);
Route::get('categories#hymn',                                ['uses' => 'HymnController@getCategories',                 'as' => 'categories']);
Route::get('all-hymns',                                      ['uses' => 'HymnController@getAllHymns']);
Route::get('all-hymns#hymn',                                 ['uses' => 'HymnController@getAllHymns',                   'as' => 'all-hymns']);
Route::get('add-hymn', 										 ['uses' => 'HymnController@getAddHymn', 'middleware'=> 'auth:user']);
Route::get('add-hymn#hymn', 							     ['uses' => 'HymnController@getAddHymn', 					'as' => 'add-hymn', 'middleware'=> 'auth:user']);
Route::get('search-results',                                 ['uses' => 'HymnController@getSearchResults',              'as' => 'search-results']);
Route::post('submit-hymn',                                   ['uses' => 'HymnController@postSubmitHymn',                'as' => 'submit-hymn']);


/*
CATEGORY CONTROLLER ROUTES
*/

Route::get('/category/entrance',                             ['uses' => 'CategoryController@getEntranceHymns']);
Route::get('/category/entrance#hymn',                        ['uses' => 'CategoryController@getEntranceHymns',          'as' => 'entrance-hymns']);
Route::get('/category/mass',                                 ['uses' => 'CategoryController@getMassHymns']);
Route::get('/category/mass#hymn',                            ['uses' => 'CategoryController@getMassHymns',              'as' => 'mass-hymns']);
Route::get('/category/bibleprocession',                      ['uses' => 'CategoryController@getBibleProcessionHymns']);
Route::get('/category/bibleprocession#hymn',                 ['uses' => 'CategoryController@getBibleProcessionHymns',   'as' => 'bible-procession-hymns']);
Route::get('/category/offertory',                            ['uses' => 'CategoryController@getOffertoryHymns']);
Route::get('/category/offertory#hymn',                       ['uses' => 'CategoryController@getOffertoryHymns',         'as' => 'offertory-hymns']);
Route::get('/category/peace',                                ['uses' => 'CategoryController@getPeaceHymns']);
Route::get('/category/peace#hymn',                           ['uses' => 'CategoryController@getPeaceHymns',             'as' => 'peace-hymns']);
Route::get('/category/communion',                            ['uses' => 'CategoryController@getCommunionHymns']);
Route::get('/category/communion#hymn',                       ['uses' => 'CategoryController@getCommunionHymns',         'as' => 'communion-hymns']);
Route::get('/category/thanksgiving',                         ['uses' => 'CategoryController@getThanksgivingHymns']);
Route::get('/category/thanksgiving#hymn',                    ['uses' => 'CategoryController@getThanksgivingHymns',      'as' => 'thanksgiving-hymns']);
Route::get('/category/advent',                               ['uses' => 'CategoryController@getAdventHymns']);
Route::get('/category/advent#hymn',                          ['uses' => 'CategoryController@getAdventHymns',            'as' => 'advent-hymns']);
Route::get('/category/lent',                                 ['uses' => 'CategoryController@getLentHymns']);
Route::get('/category/lent#hymn',                            ['uses' => 'CategoryController@getLentHymns',              'as' => 'lent-hymns']);
Route::get('/category/christmas',                            ['uses' => 'CategoryController@getChristmasHymns']);
Route::get('/category/christmas#hymn',                       ['uses' => 'CategoryController@getChristmasHymns',         'as' => 'christmas-hymns']);
Route::get('/category/pentecost',                            ['uses' => 'CategoryController@getPentecostHymns']);
Route::get('/category/pentecost#hymn',                       ['uses' => 'CategoryController@getPentecostHymns',         'as' => 'pentecost-hymns']);
Route::get('/category/epiphany',                             ['uses' => 'CategoryController@getEpiphanyHymns']);
Route::get('/category/epiphany#hymn',                        ['uses' => 'CategoryController@getEpiphanyHymns',          'as' => 'epiphany-hymns']);
Route::get('/category/palmsunday',                           ['uses' => 'CategoryController@getPalmSundayHymns']);
Route::get('/category/palmsunday#hymn',                      ['uses' => 'CategoryController@getPalmSundayHymns',        'as' => 'palm-sunday-hymns']);
Route::get('/category/ascension',                            ['uses' => 'CategoryController@getAscensionHymns']);
Route::get('/category/ascension#hymn',                       ['uses' => 'CategoryController@getAscensionHymns',         'as' => 'ascension-hymns']);
Route::get('/category/baptism',                              ['uses' => 'CategoryController@getBaptismHymns']);
Route::get('/category/baptism#hymn',                         ['uses' => 'CategoryController@getBaptismHymns',           'as' => 'baptism-hymns']);
Route::get('/category/marriage',                             ['uses' => 'CategoryController@getMarriageHymns']);
Route::get('/category/marriage#hymn',                        ['uses' => 'CategoryController@getMarriageHymns',          'as' => 'marriage-hymns']);
Route::get('/category/funeral',                              ['uses' => 'CategoryController@getFuneralHymns']);
Route::get('/category/funeral#hymn',                         ['uses' => 'CategoryController@getFuneralHymns',           'as' => 'funeral-hymns']);
Route::get('/category/praiseandworship',                     ['uses' => 'CategoryController@getPraiseAndWorshipHymns']);
Route::get('/category/praiseandworship#hymn',                ['uses' => 'CategoryController@getPraiseAndWorshipHymns',  'as' => 'praise-and-worship-hymns']);
Route::get('/category/exit',                                 ['uses' => 'CategoryController@getExitHymns']);
Route::get('/category/exit#hymn',                            ['uses' => 'CategoryController@getExitHymns',              'as' => 'exit-hymns']);
Route::get('/category/holyweek',                             ['uses' => 'CategoryController@getHolyWeekHymns']);
Route::get('/category/holyweek#hymn',                        ['uses' => 'CategoryController@getHolyWeekHymns',          'as' => 'holy-week-hymns']);
Route::get('/category/easter',                               ['uses' => 'CategoryController@getEasterHymns']);
Route::get('/category/easter#hymn',                          ['uses' => 'CategoryController@getEasterHymns',            'as' => 'easter-hymns']);
Route::get('/category/marian',                               ['uses' => 'CategoryController@getMarianHymns']);
Route::get('/category/marian#hymn',                          ['uses' => 'CategoryController@getMarianHymns',            'as' => 'marian-hymns']);
Route::get('/category/holytrinity',                          ['uses' => 'CategoryController@getHolyTrinityHymns']);
Route::get('/category/holytrinity#hymn',                     ['uses' => 'CategoryController@getHolyTrinityHymns',       'as' => 'holy-trinity-hymns']);
Route::get('/category/saints',                               ['uses' => 'CategoryController@getSaintsHymns']);
Route::get('/category/saints#hymn',                          ['uses' => 'CategoryController@getSaintsHymns',            'as' => 'saints-hymns']);
Route::get('/category/forgiveness',                          ['uses' => 'CategoryController@getForgivenessHymns']);
Route::get('/category/forgiveness#hymn',                     ['uses' => 'CategoryController@getForgivenessHymns',       'as' => 'forgiveness-hymns']);
Route::get('/category/christtheking',                        ['uses' => 'CategoryController@getChristTheKingHymns']);
Route::get('/category/christtheking#hymn',                   ['uses' => 'CategoryController@getChristTheKingHymns',     'as' => 'christ-the-king-hymns']);
Route::get('/category/discipleship',                         ['uses' => 'CategoryController@getDiscipleshipHymns']);
Route::get('/category/discipleship#hymn',                    ['uses' => 'CategoryController@getDiscipleshipHymns',      'as' => 'discipleship-hymns']);
Route::get('/category/sacredheart',                          ['uses' => 'CategoryController@getSacredHeartHymns']);
Route::get('/category/sacredheart#hymn',                     ['uses' => 'CategoryController@getSacredHeartHymns',       'as' => 'sacred-heart-hymns']);
Route::get('/category/addedum',                              ['uses' => 'CategoryController@getAddedumHymns']);
Route::get('/category/addedum#hymn',                         ['uses' => 'CategoryController@getAddedumHymns',           'as' => 'addedum-hymns']);
Route::get('/category/other',                                ['uses' => 'CategoryController@getOtherHymns']);
Route::get('/category/other#hymn',                           ['uses' => 'CategoryController@getOtherHymns',           'as' => 'other-hymns']);
/*
HYMN SLUG ROUTE
*/
Route::get('{slug}',                                         ['uses' => 'HymnController@showHymn']);