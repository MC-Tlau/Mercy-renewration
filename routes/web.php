<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dcso', function () {
    return view('dcso');
});

Route::get('/clerk', function () {
    return view('clerk');
});

Route::get('/csc', function () {
    return view('csc');
});


Route::get('/viewImage', function () {
    return view('viewImage');
});

Route::get('/index', 'testingcontroller@index');

Route::get('/form', 'testingcontroller@create');  //->middleware('auth');

Route::get('/dcsohome', function () {
    return view('homedcso');
});

Route::get('/homeclerk', function () {
    return view('clerkhome');
});

Route::post('/action', 'ApplicantsController@store');

Route::POST('/peep', 'TestingController@store');

Route::get('/download/{id}', 'TestingController@show');

Route::get('/applicants', 'ApplicantsController@index');

Route::get('/applicants/{id}', 'ApplicantsController@show');

Route::get('applicants/{id}/remarks', 'ApplicantsController@showremarks');

Route::post('applicants/{id}/remarks/action', 'ApplicantsController@storeremarks');


Route::get('/applicants_clerk', 'ApplicantsController_clerk@index');

Route::get('/applicants_clerk/{id}', 'ApplicantsController_clerk@show');

Route::post('/applicants_clerk/{id}/action', 'ApplicantsController_clerk@update');


Route::post('/applicants/{id}/action', 'ApplicantsController@update');

Route::get('/pdf/{id}', 'ApplicantsController@myDownload');

Route::get('/ration/{id}', 'TestingController@download');

// Route::post('/csc/home', 'ApplicantsController@update');


Route::get('/testform', function () {
    return view('testform');
});


Route::post('/testform/action', 'testingController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

