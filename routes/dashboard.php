<?php

Route::middleware('auth:admin')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

