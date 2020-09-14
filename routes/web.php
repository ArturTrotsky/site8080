<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/disabled', 'HomeController@disabled')->name('disabled');


Auth::routes();


Route::get('user/index', 'User\MainController@index');


Route::group(['middleware' => ['status.admin', 'auth']], function () {
    $groupData1 = [
        'namespace' => 'Admin',
        'prefix' => 'admin',
    ];
    Route::group($groupData1, function () {
        Route::resource('/panel', 'PanelController');
        Route::resource('/searches', 'SearchesSitController');
        Route::post('/searches', 'SearchesSitController@search')->name('search.sit');
        Route::resource('/types', 'TypesController');
        Route::resource('/naimens', 'NaimensController');
        Route::resource('/sits', 'SitsController');
        Route::resource('/laboratories', 'LaboratoriesController');
        Route::resource('/works', 'WorksController');
        Route::resource('/podrazdelenies', 'PodrazdeleniesController');
        Route::resource('/statuses', 'StatusesController');
        Route::resource('/edizms', 'EdIzmsController');
        Route::resource('/groups', 'GroupsController');
        Route::resource('/kabinets', 'KabinetsController');
        Route::resource('/brigades', 'BrigadesController');
        Route::resource('/users', 'UsersController');
        Route::get('/sits/downloadPDF/{id}', 'SitsController@downloadPDF');
        Route::get('/sits/showPDF/{id}', 'SitsController@showPDF');
        Route::resource('/birkas', 'BirkasController');
        Route::post('/birkas/showPDF', 'BirkasController@showPDF')->name('birka.showPDF');
        Route::post('/birkas/reset', 'BirkasController@reset')->name('birka.reset');
    });

    $groupData2 = [
        'namespace' => 'Grafik',
        'prefix' => 'admin',
    ];
    Route::group($groupData2, function () {
        Route::get('/poverka', 'AdminGrafiksController@index')->name('admin.poverka.index');
        Route::post('/poverka/filter', 'AdminGrafiksController@filter')->name('admin.poverka.filter');
        Route::post('/poverka', 'AdminGrafiksController@store')->name('admin.poverka.store');
        Route::put('/poverka/{value}', 'AdminGrafiksController@update')->name('admin.poverka.update');
        Route::post('/poverka/{value}', 'AdminGrafiksController@reset')->name('admin.poverka.reset');
        Route::post('/showPDF', 'AdminGrafiksController@showPDF')->name('admin.grafiks.showPDF');
    });
});


Route::group(['middleware' => ['status.moderator.admin', 'auth']], function () {
    $groupData = [
        'namespace' => 'Admin',
    ];
    Route::group($groupData, function () {
        Route::resource('/protocols', 'ProtocolsController');
        Route::get('/protocols/{del}', 'ProtocolsController@del')->name('protocols.del');
        Route::put('/protocols/{id}/save', 'ProtocolsController@saveToDB')->name('protocols.saveToDB');
    });
});


Route::group(['middleware' => ['status.moderator', 'auth']], function () {
    $groupData = [
        'namespace' => 'Grafik',
        'prefix' => 'moderator',
    ];
    Route::group($groupData, function () {
        Route::get('/poverka', 'ModeratorGrafiksController@index')->name('moderator.poverka.index');
        Route::post('/poverka', 'ModeratorGrafiksController@store')->name('moderator.poverka.store');
        Route::put('/poverka/{value}', 'ModeratorGrafiksController@update')->name('moderator.poverka.update');
        Route::post('/poverka/{value}', 'ModeratorGrafiksController@reset')->name('moderator.poverka.reset');
        Route::post('/showPDF', 'ModeratorGrafiksController@showPDF')->name('moderator.grafiks.showPDF');
    });
});


Route::group(['middleware' => ['status.user', 'auth']], function () {
    $groupData = [
        'namespace' => 'Grafik',
        'prefix' => 'user',
    ];
    Route::group($groupData, function () {
        Route::get('/poverka', 'UserGrafiksController@index')->name('user.poverka.index');
        Route::post('/poverka', 'UserGrafiksController@store')->name('user.poverka.store');
        Route::post('/poverka/{value}', 'UserGrafiksController@reset')->name('user.poverka.reset');
        Route::post('/showPDF', 'UserGrafiksController@showPDF')->name('user.grafiks.showPDF');
    });
});



