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

Route::get('/', 'FaqControllers\FaqController@faq');

Route::get('faq/ask_question', [
        'as' => 'ask_question',
        'uses' => '\App\Http\Controllers\FaqControllers\FaqController@ask_question',
    ]);

Route::post('faq/ask_question', [
        'as' => 'ask_question',
        'uses' => '\App\Http\Controllers\FaqControllers\FaqController@add_question',
    ]);


Route::get('/', [
        'as' => 'faq',
        'uses' => '\App\Http\Controllers\FaqControllers\FaqController@faq',
    ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
