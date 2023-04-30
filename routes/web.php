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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard', 'HomeController@dashboard')->name('admin');

Route::group(['middleware'=>['auth','IsAdmin:admin']],function(){
// Dashboard Admin
	Route::get('/admin/dashboard', 'HomeController@dashboard')->name('admin');

// Manage User
	Route::get('/admin/list_user','HomeController@list_user');
	Route::get('/admin/list_user/hapus_user/{id}', 'HomeController@delete_user');
	Route::get('/admin/list_user/tambah_user', 'HomeController@tambah_user');
	Route::post('/admin/tambah_user/upload', 'HomeController@upload_user');
	Route::post('/cek_user', 'HomeController@cek_user')->name('cek_user');
	Route::post('/cek_email', 'HomeController@cek_email')->name('cek_email');


// Manage outlet
	Route::get('/admin/list_outlet','HomeController@list_outlet');
	Route::get('/admin/list_outlet/tambah_outlet', 'HomeController@tambah_outlet');
	Route::post('/admin/tambah_outlet/upload', 'HomeController@upload_outlet');
	Route::get('/admin/list_outlet/hapus_outlet/{id}', 'HomeController@delete_outlet');
	Route::get('/admin/list_outlet/edit_outlet/{id}', 'HomeController@edit_outlet');
	Route::post('/admin/edit_outlet/update', 'HomeController@update_outlet');


// Manage member
	Route::get('/admin/list_member','HomeController@list_member');
	Route::get('/admin/list_member/tambah_member', 'HomeController@tambah_member');
	Route::post('/admin/tambah_member/upload', 'HomeController@upload_member');
	Route::get('/admin/list_member/hapus_member/{id}', 'HomeController@delete_member');
	Route::get('/admin/list_member/edit_member/{id}', 'HomeController@edit_member');
	Route::post('/admin/edit_member/update', 'HomeController@update_member');


// Manage paket
	Route::get('/admin/list_paket','HomeController@list_paket');
	Route::get('/admin/list_paket/tambah_paket', 'HomeController@tambah_paket');
	Route::post('/admin/tambah_paket/upload', 'HomeController@upload_paket');
	Route::get('/admin/list_paket/hapus_paket/{id}', 'HomeController@delete_paket');
	Route::get('/admin/list_paket/edit_paket/{id}', 'HomeController@edit_paket');
	Route::post('/admin/edit_paket/update', 'HomeController@update_paket');


// Manage transaksi
	Route::get('/admin/list_transaksi','HomeController@list_transaksi');
	Route::get('/admin/list_transaksi/tambah_transaksi', 'HomeController@tambah_transaksi');
	Route::post('/admin/tambah_transaksi/upload', 'HomeController@upload_transaksi');
	Route::get('/admin/list_transaksi/hapus_transaksi/{id}', 'HomeController@delete_transaksi');
	Route::get('/admin/list_transaksi/bayar/{id}', 'HomeController@bayar_transaksi');
	Route::get('/admin/list_transaksi/batal_bayar/{id}', 'HomeController@batal_transaksi');
	Route::post('/admin/detail_transaksi/status', 'HomeController@update_status')->name('update_status');
	Route::get('/admin/invoice/{id}','HomeController@invoice');

	// Detail Transaksi
	Route::get('/admin/list_transaksi/detail_transaksi/{id}', 'HomeController@tambah_detail');
	Route::get('/admin/detail_transaksi/{id}', 'HomeController@detail_transaksi');
	Route::post('/admin/tambah_transaksi/detail/upload', 'HomeController@upload_detail');
	Route::post('/admin/tambah_transaksi/detail/update_tambahan', 'HomeController@update_biaya');
	Route::post('/admin/tambah_transaksi/detail/update_bayar', 'HomeController@update_bayar');
	Route::post('/cek_harga', 'HomeController@cek_harga')->name('cek_harga');
});

Route::group(['middleware'=>['auth','IsAdmin:kasir']],function(){

	Route::get('/kasir/dashboard', 'KasirController@dashboard')->name('kasir');
	// Manage member
	Route::get('/kasir/list_member','KasirController@list_member');
	Route::get('/kasir/list_member/tambah_member', 'KasirController@tambah_member');
	Route::post('/kasir/tambah_member/upload', 'KasirController@upload_member');
	Route::get('/kasir/list_member/hapus_member/{id}', 'KasirController@delete_member');
	Route::get('/kasir/list_member/edit_member/{id}', 'KasirController@edit_member');
	Route::post('/kasir/edit_member/update', 'KasirController@update_member');


// Manage paket
	Route::get('/kasir/list_paket','KasirController@list_paket');
	Route::get('/kasir/list_paket/tambah_paket', 'KasirController@tambah_paket');
	Route::post('/kasir/tambah_paket/upload', 'KasirController@upload_paket');
	Route::get('/kasir/list_paket/hapus_paket/{id}', 'KasirController@delete_paket');
	Route::get('/kasir/list_paket/edit_paket/{id}', 'KasirController@edit_paket');
	Route::post('/kasir/edit_paket/update', 'KasirController@update_paket');


// Manage transaksi
	Route::get('/kasir/list_transaksi','KasirController@list_transaksi');
	Route::get('/kasir/list_transaksi/tambah_transaksi', 'KasirController@tambah_transaksi');
	Route::post('/kasir/tambah_transaksi/upload', 'KasirController@upload_transaksi');
	Route::get('/kasir/list_transaksi/hapus_transaksi/{id}', 'KasirController@delete_transaksi');
	Route::get('/kasir/list_transaksi/bayar/{id}', 'KasirController@bayar_transaksi');
	Route::get('/kasir/list_transaksi/batal_bayar/{id}', 'KasirController@batal_transaksi');
	Route::post('/kasir/detail_transaksi/status', 'KasirController@update_status');

	// Detail Transaksi
	Route::get('/kasir/list_transaksi/detail_transaksi/{id}', 'KasirController@tambah_detail');
	Route::get('/kasir/detail_transaksi/{id}', 'KasirController@detail_transaksi');
	Route::post('/kasir/tambah_transaksi/detail/upload', 'KasirController@upload_detail');
	Route::post('/cek_harga/kasir', 'HomeController@cek_harga')->name('cek_harga_kasir');

});