<?php

use Illuminate\Support\Facades\Auth;
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

/* CHIUNQUE */

Route::get('/', 'PublicController@index')->name('public.index');
Route::get('/category/{name}/{id}/adds', 'PublicController@addsByCategory')->name('public.adds.category');
Route::get('/add/{add}/detail', 'PublicController@addDetail')->name('public.detail');
Route::get('/search','PublicController@search')->name('search');
Route::get('/contact', 'PublicController@contact')->name('public.contact');
Route::post('/contact/send', 'PublicController@contactSubmit')->name('public.submit');
Route::post('/locale/{locale}', 'PublicController@locale')->name('locale');


/* USER LOGGATI */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adds/new' , 'HomeController@newAdd')->name('add.new');
Route::post('/adds/create', 'HomeController@createAdd')->name('add.create');
Route::get('/user/profile', 'HomeController@userProfile')->name('profile');
Route::post('/add/images/upload', 'HomeController@uploadImage')->name('add.images.upload');
Route::delete('/add/images/remove', 'HomeController@removeImage')->name('add.images.remove');
Route::get('/add/images', 'HomeController@getImages')->name('add.images');

/* REVISORE */

Route::get('/revisor/home', 'RevisorController@index')->name('revisor.home');
Route::post('/revisor/adds/{id}/accept', 'RevisorController@accept')->name('revisor.accept');
Route::post('/revisor/adds/{id}/reject', 'RevisorController@reject')->name('revisor.reject');
Route::post('/revisor/adds/{id}/undo', 'RevisorController@undo')->name('revisor.undo');
Route::get('/revisor/rejectedAdds', 'RevisorController@rejectedAdds')->name('rejectedadds');

/* ADMIN */
Route::get('/admin/home', 'AdminController@index')->name('admin.home');
Route::post('/admin/{id}/is_revisor', 'AdminController@makeRevisor')->name('makeRevisor');
Route::post('/admin/{id}/is_not_revisor', 'AdminController@removeRevisor')->name('removeRevisor');

