<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Http\Request;


Route::get('/', [ChirpController::class, 'index'])->name('home');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});


Route::view('/register', 'auth.register')->middleware('guest');
Route::post('/register', RegisterController::class)->middleware('guest');

Route::view('/login', 'auth.login')->middleware('guest')->name('login');
Route::post('/login', LoginController::class)->middleware('guest');

Route::post('/logout', LogoutController::class)->middleware('auth');

Route::post('/chirps', [ChirpController::class, 'store'])->middleware('auth');
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->middleware('auth');
Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->middleware('auth');
Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->middleware('auth');
