<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/validate', 'StudentsController@index');
Route::Post('/validate', 'StudentsController@store');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index');

    Route::resource('/profile', 'DriversController');

    Route::get('/offer', 'OfferController@index');
    Route::get('/offer/create', 'OfferController@create');
    Route::post('/offer', 'OfferController@store');
    Route::get('/offer/{offer}/edit', 'OfferController@edit');
    Route::patch('/offer/{offer}', 'OfferController@update');
    Route::delete('/offer/{offer}/delete', 'OfferController@destroy');

    Route::get('/catalog', 'BooksController@index');
    Route::get('/catalog/{offer}/details', 'BooksController@create');
    Route::post('/catalog/{offer}', 'BooksController@store');
    Route::get('/notification', 'BooksController@show');
    Route::get('/booking/{booking}/details', 'BooksController@edit'); //notification
    Route::patch('/booking/{booking}', 'BooksController@update');

    Route::get('/confirmation', 'BooksController@show2');
    Route::get('/confirmation/{confirmation}/details', 'BooksController@edit2');    //notification
    Route::patch('/confirmation/{confirmation}', 'BooksController@update2');
    Route::post('/confirmation/{confirmation}', 'BooksController@update3');
    Route::get('/payment/{id}', 'BooksController@payment')->name('payment');   //payment

    Route::get('/passenger_list', 'BooksController@show3'); //feedback for passenger
    Route::get('/passenger_list/{user_id}', 'DriversController@showPassenger'); //feedback for passenger
    Route::get('profiles_passenger/{user_id}/comments', 'CommentpsController@index'); //feedback for passenger
    Route::post('profiles_passenger/', 'CommentpsController@store'); //feedback for passenger

    Route::get('/driver_list', 'BooksController@show4'); //feedback for driver
    Route::get('profiles/{user_id}/comments', 'CommentdsController@index'); //feedback
    Route::post('profiles/', 'CommentdsController@store'); //feedback

    Route::get('/start', 'StartsController@index');
    Route::get('/start/{book}', 'StartsController@create');

    Route::get('/report', 'OfferController@report');

    Route::get('/invoice/{invoice}', 'BooksController@invoice');
    Route::get('pdf/resit/{invoice}','BooksController@showReceiptPDF');





    //ajax
    Route::get('/ajax-district', 'OfferController@ajax');
    Route::get('/ajax-subdistrict', 'OfferController@ajax2');

    // Route::get('test', function () {
    //     $timestamp = Carbon\Carbon::now();
    //     $user = auth()->user();
    //     $user->notify(new App\Notifications\HantarEmel($timestamp));
    // })->name('email.test');


});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('datatables', function () {
    $users =  App\User::all();
    return view('datatable', compact('users'));
});


Route::get('testing', function () {
    return view('testing');
});
