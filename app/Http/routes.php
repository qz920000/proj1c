<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

///*********************General menu Section**************************/////////////////////
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@home']);
//Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);

//Route::get('/', 'PagesController@home');
////Route::get('/', function () {
////    //return view('welcome');
////    
////});
//Route::get('/about', 'PagesController@about');
//
////form to add data
//Route::get('/contact', 'TicketsController@create');
//
////action to insert data
//Route::post('/contact', 'TicketsController@store');

//view all tickets
Route::get('/tickets', 'TicketsController@index');

//view single ticket
Route::get('/ticket/{slug?}', 'TicketsController@show');

//edit ticket form
Route::get('/ticket/{slug?}/edit','TicketsController@edit');

//edit ticket action.. update action
Route::post('/ticket/{slug?}/edit','TicketsController@update');

//delete ticket
Route::get('/ticket/{slug?}/delete','TicketsController@destroy');

//
Route::get('sendemail', function () {
$data = array(
'name' => "Learning Laravel",
);
Mail::send('emails.welcome', $data, function ($message) {
$message->from('qz920000@gmail.com', 'Learning Laravel');
$message->to('qz91@yahoo.com')->subject('Learning Laravel test email');
});
return "Your email has been sent successfully";
});

Route::post('/comment', 'CommentsController@newComment');