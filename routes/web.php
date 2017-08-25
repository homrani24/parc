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
Route::get('/404', function () {
    return view('ereur/page404');
 })->name('404');

Route::get('/admin', function () {
    return view('admin/index');
 })->name('admin');

Route::get('/technicien', function () {
    return view('technicien/index');
 })->name('technicien');


Route::get('/user', function () {
    return view('user/index');
 })->name('user');


Route::get('/supervisseur', function () {
    return view('supervisseur/index');
 })->name('supervisseur');

Route::post('/login/custom', [
    'uses'=>'Auth\LoginController@login',
    'as'=>'login.custom'
]);
Route::get('/logoute', 'Auth\LoginController@logout')->name('logoute');
