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

/* USER LOGGATI */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adds/new' , 'HomeController@newAdd')->name('add.new');
Route::post('/adds/create', 'HomeController@createAdd')->name('add.create');

/* REVISORE */

Route::get('/revisor/home', 'RevisorController@index')->name('revisor.home');
Route::post('/revisor/adds/{id}/accept', 'RevisorController@accept')->name('revisor.accept');
Route::post('/revisor/adds/{id}/reject', 'RevisorController@reject')->name('revisor.reject');