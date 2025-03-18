<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout.main');
// });
Route::get('/', [ProfileController::class, 'showForm'])->name('profile.index');
Route::post('/profile', [ProfileController::class, 'store']);
Route::get('/profiles', [ProfileController::class, 'showUsers'])->name('profile.list');
Route::get('profiles/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('profiles/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('profiles/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');
