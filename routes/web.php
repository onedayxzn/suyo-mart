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

//homepage
Route::get('/', 'homepageController@index')->name('homepage');


//konsumen
Route::get('home', 'pesananController@index')->name('home');
Route::get('indonesia', 'pesananController@indonesia')->name('indonesia');
Route::get('korea', 'pesananController@korea')->name('korea');
Route::get('japan', 'pesananController@japan')->name('japan');
Route::get('india', 'pesananController@india')->name('india');
Route::get('detailproduk/detail/{id}', 'pesananController@detailProduk')->name('detail');
Route::post('detail/pesanProduk', 'pesananController@pesanProduk')->name('pesanProduk');
Route::get('carii', 'homepageController@searchKonsumen')->name('carii');
Route::get('detail/pesanProduk/checkout/{id}', 'pesananController@chekout')->name('chekout');



//admin
Route::post('login', 'autentikasi\autentikasiController@login')->name('login');
Route::get('login', 'autentikasi\autentikasiController@index')->name('login');
Route::post('register', 'autentikasi\autentikasiController@register')->name('register');
Route::get('register', 'autentikasi\autentikasiController@registerView')->name('Register');


//admin middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get('profile', 'homepageController@profile')->name('profile');
    Route::get('produk', 'produkController@index')->name('produk');
    Route::get('produk/tambahProduk', 'produkController@tambahProduk')->name('tambahProduk');
    Route::post('produk/simpanProduk', 'produkController@simpanProduk')->name('simpanProduk');
    Route::get('produk/editProduk/{id_produk}', 'produkController@editProduk')->name('editProduk');
    Route::patch('produk/{id_produk}', 'produkController@editProdukProses')->name('editProdukProses');
    Route::get('produk/detailProduk/{id_produk}', 'produkController@detailProduk')->name('detailProduk');
    Route::delete('produk/hapusProduk/{id_produk}', 'produkController@hapusProduk')->name('hapusProduk');
    Route::get('pesanan', 'pesananController@pesanan')->name('pesanan');
    Route::delete('pesanan/hapusPesanan/{ID_PESANAN}', 'pesananController@hapusPesanan')->name('hapusPesanan');
    Route::get('cari', 'homepageController@searchAdmin')->name('cari');
    Route::patch('stok/{id_produk}', 'produkController@addStock')->name('tambahStok');
    Route::get('logout', 'autentikasi\autentikasiController@logout')->name('logout');
});
