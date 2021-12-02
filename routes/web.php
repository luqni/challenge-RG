<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

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
    return view('home/layout');
})->name('home');


Route::post('/TambahPelanggan', 'App\Http\Controllers\PelangganController@store')->name('pelanggan.store');

Route::get('/Dashboard', 'App\Http\Controllers\PelangganController@index')->name('form');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    // return view('admin/layout');
    return redirect()->route('form');
})->name('dashboard');

Route::post('/UpdatePelanggan', 'App\Http\Controllers\PelangganController@update')->name('pelanggan.update');
