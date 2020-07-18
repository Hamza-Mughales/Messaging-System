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


// Maing index
Route::get('/', 'msgSystemController@index')->name('home');

// Login & Logout
Route::get('/login', 'contactController@login')->name('login');
Route::post('/login/contact', 'contactController@login')->name('contact_login');
Route::get('/logout', 'contactController@logout')->name('logout');



// Contact routes
Route::get('/contacts', 'contactController@index')->name('contact_info');
Route::get('/contact/new', 'contactController@new_contact')->name('new_contact');
Route::post('/contact/new', 'contactController@new_contact')->name('create_contact');
Route::get('/contact/edit/{contact_id}', 'contactController@edit_contact')->name('edit_contact');
Route::post('/contact/edit', 'contactController@edit_contact')->name('update_contact');


// Message routes
Route::get('/messages', 'messageController@index')->name('messages');
Route::get('/message/show/{message_id}', 'messageController@show_message')->name('show_message');
Route::get('/message/new', 'messageController@new_message')->name('new_message');
Route::post('/message', 'messageController@new_message')->name('create_message');
Route::get('/message/delete/{msg_id}', 'messageController@delete_message')->name('delete_message');

