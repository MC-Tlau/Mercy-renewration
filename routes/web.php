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

Route::post('/contact', 'ContactController@create');

Route::post('/status', 'HomePageController@status');

Route::get('/pdf/{id}', 'ApplicantsController@myDownload');

Route::get('/ration/{id}', 'HomePageController@download');

Route::get('/time', 'TestingController@edit') ;  

Route::group(['middleware'=>['auth', 'check1']], function()
{
    Route::get('/form', 'HomePageController@showform');
    Route::post('/action', 'ApplicantsController@store');

});

Route::group(['middleware'=>['auth', 'check2']], function()
{
    Route::get('/applicants', 'ApplicantsController@index');
    Route::get('/applicants/{id}', 'ApplicantsController@show');
    Route::post('/applicants/{id}/action', 'ApplicantsController@update');
    Route::get('applicants/{id}/remarks', 'ApplicantsController@showremarks');
    Route::post('applicants/{id}/remarks/action', 'ApplicantsController@storeremarks');
    Route::get('/monitor', 'MonitorController@index');
    Route::get('/searchdcso', 'SearchController@searchDcso');
    Route::get('/search', 'SearchController@searchall');

});

Route::group(['middleware'=>['auth', 'check3']], function()
{
    Route::get('/applicants_clerk', 'ApplicantsController_clerk@index');
    Route::get('/applicants_clerk/{id}', 'ApplicantsController_clerk@show');
    Route::post('/applicants_clerk/{id}/action', 'ApplicantsController_clerk@update');
    Route::get('/searchclerk', 'SearchController@searchClerk');

    
});


Route::group([], function()  
{
    Route::get ('/admin', 'AdminController@index');   
    Route::get ('/admin/edit/{id}', 'AdminController@edit');   
    Route::post ('/admin/update/{id}', 'AdminController@update');   
    Route::get ('/admin/destroy/{id}', 'AdminController@destroy');    
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

