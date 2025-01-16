<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    return inertia('Home', [
        'users' => User::when($request->search, function($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate(10)->withQueryString(),
        'searchTerm' => $request->search,
        
        'can' => [
            'delete_user' => 
            Auth::user() ? Auth::user()->can('delete', User::class) : null
        ]
    ]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

Route::middleware('guest')->group(function () { 
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});



//Route::get('/about', function () {
//    return inertia('About');
//});
//tong nasa taas pwede siya as route sa about gamit inertia

//eto naman passing of args lang
//Route::get('/about', function(){
//    return inertia('About', ['user' => 'User1']);
//});

//tong nasa baba shorthand notation lang
//Route::inertia('/about', 'About', ['user' => 'User1'])->name('about');