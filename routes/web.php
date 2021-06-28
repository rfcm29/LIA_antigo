<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CentroCustos;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\KitsController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UsersController;
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
})->name('home');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/categoria', [KitsController::class, 'userIndex']);

//usar grupos para limitar acesso a certas rotas

Route::group(['middleware'=> ['AuthCheck']], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware'=> ['UserTypeCheck']], function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');

    //kits
    Route::resource('admin/kits', KitsController::class);
    Route::post('/admin/kits/search', [KitsController::class, 'search'])->name('kits.search');

    //centro de custos
    Route::resource('admin/centroCustos', CentroCustos::class);

    //users
    Route::resource('admin/users', UsersController::class);

    //reservas
    Route::resource('admin/reservas', ReservasController::class);
});
