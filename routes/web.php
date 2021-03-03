<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hh');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/monitor', 'MonitorController@index');

Route::post('/contact', 'ContactController@create');

Route::post('/status', 'HomePageController@status');

Route::get('/form', 'HomePageController@showform') ->middleware('auth','check1'); 

Route::post('/action', 'ApplicantsController@store')->middleware('auth','check1');

// Route::POST('/peep', 'HomePageController@store');

// Route::get('/download/{id}', 'HomePageController@show');

Route::get('/applicants', 'ApplicantsController@index')->middleware('auth', 'check2');

Route::get('/applicants/{id}', 'ApplicantsController@show')->middleware('auth', 'check2');

Route::post('/applicants/{id}/action', 'ApplicantsController@update');

Route::get('applicants/{id}/remarks', 'ApplicantsController@showremarks')->middleware('auth', 'check2');

Route::post('applicants/{id}/remarks/action', 'ApplicantsController@storeremarks')->middleware('auth', 'check2');

Route::get('/applicants_clerk', 'ApplicantsController_clerk@index')->middleware('auth', 'check3');

Route::get('/applicants_clerk/{id}', 'ApplicantsController_clerk@show')->middleware('auth', 'check3');

Route::post('/applicants_clerk/{id}/action', 'ApplicantsController_clerk@update')->middleware('auth', 'check3');;

Route::get('/pdf/{id}', 'ApplicantsController@myDownload');

Route::get('/ration/{id}', 'HomePageController@download');

Route::get('/time', 'TestingController@edit');

Route::get('/searchclerk', 'SearchController@searchClerk');

Route::get('/searchdcso', 'SearchController@searchDcso');

Route::get('/search', 'SearchController@searchall');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

