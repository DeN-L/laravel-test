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

Route::group(['middleware' => 'is_admin'], function () {
    Route::resource('articles', 'ArticleController');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route to static view
Route::get('/time', function () {
    return view('time/index');
})->name('time');

Route::get('jobs', function () {
    App\Jobs\SendMessage::dispatch('TEST MESSAGE');

    /*// Job with delay
    App\Jobs\SendMessage::dispatch('TEST MESSAGE')->delay(now()->addMinutes(10));*/

    /*// Chain of jobs
    App\Jobs\SendMessage::withChain([
        new  App\Jobs\SecondMessage('Second job'),
        new  App\Jobs\ThirdMessage('Third job'),
    ])->dispatch('First job');*/
});
