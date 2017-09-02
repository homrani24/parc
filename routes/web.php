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
   // return view('welcome');
   return redirect()->route('logoute');   
   
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/404', function () {
    return view('ereur/page404');
 })->name('404');


Route::post('/login/custom', [
    'uses'=>'Auth\LoginController@login',
    'as'=>'login.custom'
]);
Route::get('/logoute', 'Auth\LoginController@logout')->name('logoute');
// user
Route::group(['middleware' => 'userauth:user'], function () {
    //

Route::get('/user', function () {
    return view('user/index');
 })->name('user');

});
// supervisseur
Route::group(['middleware' => 'userauth:supervisseur'], function () {
    //


    Route::get('/supervisseur', function () {
        return view('supervisseur/index');
     })->name('supervisseur');
    
});
//  technicien
Route::group(['middleware' => 'userauth:technicien'], function () {
    //

    Route::get('/technicien', function () {
        return view('technicien/index');
     })->name('technicien');
    
 
});

// admin midlware
Route::group(['middleware' => 'userauth:admin'], function () {
    Route::get('/admin', function () {
        return view('admin/index');
     })->name('admin'); 
     Route::get('/admin/users', 'UserControlleur@afficherlesusers')->name('tableusers');
     Route::get('/admin/etat/{id}', 'UserControlleur@changeretat')->name('changetat');
     Route::get('/admin/supp/{id}', 'UserControlleur@supprimeuser')->name('supprimeuser');
     Route::get('/admin/profil', 'UserControlleur@profil')->name('profil');
     Route::post('/admin/modifprofil', 'UserControlleur@modifprofil')->name('modifprofil');
     Route::post('/admin/modifpass', 'UserControlleur@modifpass')->name('modifpass');

});
