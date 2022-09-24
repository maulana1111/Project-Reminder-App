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

// home
Route::get('/', 'HomeController@index');
Route::post('/home/login', 'HomeController@login');
Route::get('/home/logout', 'HomeController@logout');

// index
Route::get('/index', 'IndexController@index');

//berkas
Route::get('/berkas', 'BerkasController@index');
Route::post('/berkas/AddBerkas', 'BerkasController@addNewBerkas');

//pembayaran lewat class berkas
Route::post('/berkas/pembayaran', 'BerkasController@addPembayaran');

//detail
// Route::get('/detail', 'DetailController@index');
Route::get('/detail/{id}', 'DetailController@detailBerkas');

// kategori
Route::get('/kategori/{id}', 'KategoriController@index');
Route::get('/TambahKategori', 'KategoriController@AddKategori');
Route::post('/DoTambahKategori', 'KategoriController@DoAddKategori');

// penanggung
Route::get('/penanggung', 'PenanggungController@index');
Route::post('/penanggung/Add', 'PenanggungController@Add');

//notif
Route::post('/getDataForNotif', "NotificationController@index");

Route::post('/showNotif', "NotificationController@Notif");

// Gmail
Route::get("/SendGmail", "EmailController@sendEmail");


