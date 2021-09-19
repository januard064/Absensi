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
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/absen', 'HomeController@absen');

// Route::get('/izin', 'HomeController@izin')->name('izin');
// Route::post('/izinpost', 'HomeController@izinpost');


Route::group(['middleware' => ['auth','cekjabatan:Manajer']], function(){
    route::get('laporan', 'ManajerController@laporan')->name('laporan');

    route::get('/laporanizin', 'ManajerController@laporanizin')->name('laporanizin');

    route::get('izin/konfirmasi/{id}','ManajerController@konfirmasi');
   
});

Route::group(['middleware' => ['auth','cekjabatan:Manajer,Karyawan']], function(){
    route::get('/home', 'HomeController@index')->name('home');
    route::post('/absen', 'HomeController@absen');
    
    route::get('/izin', 'HomeController@izin')->name('izin');
    route::post('/izinpost', 'HomeController@izinpost');



});



