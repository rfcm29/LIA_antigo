<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\ItensController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [Auth::class, 'register'])->name('auth.register');
Route::post('/save', [Auth::class, 'save'])->name('auth.save');
Route::post('/check', [Auth::class, 'check'])->name('auth.check');
Route::get('/logout', [Auth::class, 'logout'])->name('auth.logout');
Route::resource('admin/itens', ItensController::class);

//usar grupos para limitar acesso a certas rotasd


Route::group(['middleware'=> ['AuthCheck']], function(){
    Route::get('/login', [Auth::class, 'login'])->name('auth.login');
    Route::get('/admin/dashboard', [Auth::class, 'dashboard']);
});

Route::group(['middleware'=> ['AuthCheck']], function(){
    Route::get('/login', [Auth::class, 'login'])->name('auth.login');
    Route::get('/admin/dashboard', [Auth::class, 'dashboard']);
});
