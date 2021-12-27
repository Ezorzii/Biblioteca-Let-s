<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function(){
    Route::resource('loan', 'LoanController');
    Route::post('loan/{loan}/devolution', 'LoanController@devolution')->name('loan.devolution');


Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
    Route::prefix('books')->name('books.')->group(function() {

        Route::get('/', 'BookController@index')->name('index');
        Route::get('/create', 'BookController@create')->name('create');
        Route::post('/book', 'BookController@book')->name('book');
        Route::get('/{book}/edit', 'BookController@edit')->name('edit');
        Route::post('/update/{book}', 'BookController@update')->name('update');
        Route::get('/destroy/{book}', 'BookController@destroy')->name('destroy');

    });
});

});

    Route::prefix('book')->name('book.')->group(function(){
        Route::post('loan', 'LoanController@loan')->name('loan');
    });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');//->middleware('auth');


