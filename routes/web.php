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

Route::get('/', 'HomeController@index');

Auth::routes();

// Route::match(['GET', 'POST'], '/register', function(){
//     return redirect('/login');
// });

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/guest', [App\Http\Controllers\GuestController::class, 'index'])->name('guestHome');

Route::get('/lensa', 'GlobalController@lensaIndex')->name('lensaIndex');
Route::post('/lensa/save', 'GlobalController@lensaSave')->name('lensaSave');
Route::get('/lensa/{id}', 'GlobalController@lensaGetData')->name('lensaGetData');
Route::get('/lensa/delete/{id}', 'GlobalController@lensaDelete')->name('lensaDelete');

Route::get('/frame', 'GlobalController@frameIndex')->name('frameIndex');
Route::post('/frame/save', 'GlobalController@frameSave')->name('frameSave');
Route::get('/frame/{id}', 'GlobalController@frameGetData')->name('frameGetData');
Route::get('/frame/delete/{id}', 'GlobalController@frameDelete')->name('frameDelete');

Route::get('/about', 'GlobalController@aboutIndex')->name('aboutIndex');
Route::post('/about/save', 'GlobalController@aboutSave')->name('aboutSave');

Route::get('/order', 'GlobalController@orderIndex')->name('orderIndex');
Route::get('/newOrder', 'GlobalController@newOrderIndex')->name('newOrderIndex');
Route::get('/detailOrder/{id}', 'GlobalController@detailOrderIndex')->name('detailOrderIndex');
Route::post('/orderSave', 'GlobalController@orderSave')->name('orderSave');

Route::get('/mataMinus', 'GlobalController@mataMinus')->name('mataMinus');
Route::get('/mataPlus', 'GlobalController@mataPlus')->name('mataPlus');

Route::get('/guestLensa', 'GlobalController@guestLensa')->name('guestLensa');
Route::get('/guestFrame', 'GlobalController@guestFrame')->name('guestFrame');