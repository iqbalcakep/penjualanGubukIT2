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
//LOGIN
Route::get('/','Login@index');
Route::get('/log_out', 'Login@logout');
Route::post('/login_aksi','Login@login_aksi');


//Admin
Route::group(['middleware' => 'CheckLoginAdmin'], function () {
    Route::get('/admin','Admin\Admin@index');
    Route::get('/showProduk', 'Admin\Admin@showProduk');
    Route::get('/showUser','Admin\Admin@showUser');
    Route::post('/Produk/deleteProduk','Admin\Produk@deleteProduk');
    Route::post('/Produk/saveProduk', 'Admin\Produk@saveProduk');
    Route::post('/user/saveUser', 'Admin\Admin@saveUser');
    Route::post('/user/deleteUser', 'Admin\Admin@deleteUser');
    Route::post('/user/updateUser', 'Admin\Admin@updateUser');
    Route::post('/Produk/updateProduk', 'Admin\Produk@updateProduk');
    });
    



//USER
Route::group(['middleware' => 'CheckLoginUser'], function () {
Route::get('/user','User\Pengguna@index');
Route::get('/deposit','User\Pengguna@deposit');
Route::post('/user/checkOut','User\Produk@checkout');
Route::post('/user/addDeposit', 'User\Pengguna@addDeposit');
});