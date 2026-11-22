<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/dokumentasi', 'dokumentasi')->name('dokumentasi');
