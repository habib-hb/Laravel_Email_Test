<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Names;
use App\Models\User;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');









Route::get('/counter', Counter::class);

Route::get('/email', function (Request $request) {

    // Http query parameters
    $name = $request->query('name');



    Mail::to("developerhabib1230@gmail.com")->send(new App\Mail\testMail($name));
    return redirect('/');
});


Route::get('/data', function (Request $request) {

    $name = Names::where('name', 'Bob Builder')->first();

    $description = $name->description;

    $email = User::where('id', '3')->first()->email;

    return response()->json(['description' => $description , 'email' => $email ]);

});


Route::get('/search', function (Request $request) {

    // Http query parameters
    $name = $request->query('name');

    $data = Names::search($name)->get();

    // return response()->json($data);

    return view('search');

});









require __DIR__.'/auth.php';
