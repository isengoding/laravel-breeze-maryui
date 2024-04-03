<?php

use Livewire\Volt\Volt;

require __DIR__ . '/auth.php';

// Define the logout
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Volt::route('/', 'pages.dashboard');
    Volt::route('/dashboard', 'pages.dashboard')->name('dashboard');
});
