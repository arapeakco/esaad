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


Route::get('image/{folder}/{path}/{size?}', 'MediaController@photo');




Route::get('/', 'Front\HomeController@index');
Route::get('/faqs', 'Front\HomeController@faqsAjax');
Route::post('/contact', 'Front\HomeController@storeContact');


Route::post('/pay' , 'Front\TransactionController@store');
Route::get('/pay/status' , 'Front\TransactionController@status');

