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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'customer/ticket', 'namespace' => 'Customer', 'middleware' => 'auth'], function() {
	Route::get('/', 'TicketController@index')->name('customer.ticket.index');
	Route::get('/create', 'TicketController@create')->name('customer.ticket.create');
	Route::get('/show/{id}/newest', 'TicketController@newest')->name('customer.ticket.newest');
	Route::get('/show/{id}/latest', 'TicketController@latest')->name('customer.ticket.latest');
	Route::get('/show/{id}', 'TicketController@show')->name('customer.ticket.show');
	Route::post('/store', 'TicketController@store')->name('customer.ticket.store');
	Route::post('/mark-read', 'TicketController@markRead')->name('customer.ticket.mark-read');
});

Route::group(['prefix' => 'customer/comment', 'namespace' => 'Customer', 'middleware' => 'auth'], function() {

	Route::post('/store', 'CommentController@store')->name('customer.comment.store');
});

Route::group(['prefix' => 'admin/ticket', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
	Route::get('/', 'TicketController@index')->name('admin.ticket.index');
	Route::get('/create', 'TicketController@create')->name('admin.ticket.create');
	Route::get('/show/{id}', 'TicketController@show')->name('admin.ticket.show');
	Route::post('/store', 'TicketController@store')->name('admin.ticket.post');
});