<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profiles',[ProfileController::class, 'index'])->name('profile.index');
Route::get('profiles/{profile}',[ProfileController::class, 'show'])->name('profile.index');
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::post('/profiles', [ProfileController::class, 'store'])->name('profile.store');
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/user/{user}/profiles',[UserController::class, 'userProfiles'])->name('user.profile');