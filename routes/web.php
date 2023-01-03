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


Route::get('/','UserController@mainIndex')->name('mainIndex');

Route::get('/loginPage', 'UserController@loginPage')->name('loginPage');
Route::get('/joinPage', 'UserController@joinPage')->name('joinPage');

Route::post('/loginAction', 'UserController@loginAction')->name('loginAction');
Route::post('/joinAction', 'UserController@joinAction')->name('joinAction');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/gardenPage', 'GardenController@gardenPage')->name('gardenPage');
Route::get('/gardenMorePage/{id}', 'GardenController@gardenMorePage')->name('gardenMorePage');

Route::get('/reserveSignPage/{id}', 'ReserveController@reserveSignPage')->name('reserveSignPage');
Route::post('/reserveChk', 'ReserveController@reserveChk')->name('reserveChk');
Route::post('/reserveSignAction', 'ReserveController@reserveSignAction')->name('reserveSignAction');

Route::post('/reserveCancel', 'ReserveController@reserveCancel')->name('reserveCancel');

Route::post('/reviewAction', 'ReviewController@reviewAction')->name('reviewAction');

Route::get('/reserveListPage', 'ReserveController@reserveListPage')->name('reserveListPage');

Route::post('/reserveStop', 'ReserveController@reserveStop')->name('reserveStop');

Route::get('/boardPage', 'BoardController@boardPage')->name('boardPage');
Route::get('/boardViewPage/{id}', 'BoardController@boardViewPage')->name('boardViewPage');
Route::post('/boardCom', 'BoardController@boardCom')->name('boardCom');
