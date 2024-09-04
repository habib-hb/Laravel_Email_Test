<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Mail;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');









Route::get('/counter', Counter::class);

Route::get('/email', function () {
    Mail::to("developerhabib1230@gmail.com")->send(new App\Mail\testMail());
    return redirect('/');
});









require __DIR__.'/auth.php';
