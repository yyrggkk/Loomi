<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('index'); })->name('index');
Route::get('/home', function () { return view('pages.home'); })->name('home');
Route::get('/loopi', function () { return view('pages.loopi'); })->name('loopi');
Route::get('/explore', function () { return view('pages.explore'); })->name('explore');
Route::get('/inbox', function () { return view('pages.inbox'); })->name('inbox');
Route::get('/profile', function () { return view('pages.profile'); })->name('profile');
Route::get('/profileUser', function () { return view('pages.profileUser'); })->name('profileUser');
Route::get('/settings', function () { return view('pages.settings'); })->name('settings');
