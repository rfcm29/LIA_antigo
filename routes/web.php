<?php

use App\Http\Controllers\AuthController;
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

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//usar grupos para limitar acesso a certas rotas

Route::group(['middleware'=> ['AuthCheck']], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware'=> ['UserTypeCheck']], function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin/itens', ItensController::class);
});
