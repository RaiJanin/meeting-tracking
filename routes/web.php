<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () { return view('pages.login-page'); })->name('login');

Route::prefix('/app')->group(function () {

    Route::get('/home', function () { return view('pages.home'); })->name('home');

    Route::get('/create-agenda', function () { return view('pages.agenda.create'); })->name('agenda.create');
    Route::get('/view-agenda', function () { return view('pages.agenda.view-all'); })->name('agenda.view-all');

    Route::get('/concerns', function () { return view('pages.concerns.all-concerns'); })->name('concerns.all-concerns');
    Route::get('/concerns/me', function () { return view('pages.concerns.my-concerns'); })->name('concerns.my-concerns');

    Route::get('/calendar', function () { return view('pages.calendar'); })->name('calendar');

    Route::get('/history', function () { return view('pages.archives.history'); })->name('archives.history');
    Route::get('/reports', function () { return view('pages.archives.reports'); })->name('archives.reports');

    Route::get('/users', function () { return view('pages.people'); })->name('people');

    Route::get('/profile', function () { return view('pages.settings.profile'); })->name('settings.profile');
    Route::get('/security', function () { return view('pages.settings.security'); })->name('settings.security');
    
});