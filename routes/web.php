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
    return redirect()->route('dashboard');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::prefix('ruangan')->group(function () {
  Route::get('/', 'RuanganController@index')->name('ruangan');
  Route::post('/create', 'RuanganController@create')->name('ruangan_create');
  Route::patch('/update', 'RuanganController@update')->name('ruangan_update');
  Route::delete('/delete', 'RuanganController@delete')->name('ruangan_delete');
  Route::get('/qrcode/{id}', 'RuanganController@qrcode')->name('ruangan_qrcode');
});

Route::prefix('petugas')->group(function () {
  Route::get('/', 'PetugasController@index')->name('petugas');
  Route::post('/create', 'PetugasController@create')->name('petugas_create');
  Route::patch('/update', 'PetugasController@update')->name('petugas_update');
  Route::delete('/delete', 'PetugasController@delete')->name('petugas_delete');
});

Route::prefix('asset')->group(function () {
  Route::get('/', 'AssetController@index')->name('asset');
  Route::post('/create', 'AssetController@create')->name('asset_create');
  Route::patch('/update', 'AssetController@update')->name('asset_update');
  Route::delete('/delete', 'AssetController@delete')->name('asset_delete');
  Route::prefix('aktifitas')->group(function () {
    Route::get('/{id}', 'AssetController@aktifitas')->name('asset_aktifitas');
    Route::post('', 'AssetController@aktifitas_create')->name('asset_aktifitas_create');
    Route::delete('', 'AssetController@aktifitas_delete')->name('asset_aktifitas_delete');
  });
});

Route::prefix('aktifitas')->group(function () {
  Route::get('/', 'AktifitasController@index')->name('aktifitas');
});

Route::prefix('preview')->group(function () {
  Route::get('/{id}', 'PreviewController@index')->name('preview');
});
