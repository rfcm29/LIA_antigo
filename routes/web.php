<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CentroCustos;
use App\Http\Controllers\KitsController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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
    return view('user.menu');
})->name('home');

Auth::routes();

Route::get('/contactos', [AuthController::class, 'contactos'])->name('contactos');
Route::get('/carrinho', [AuthController::class, 'carrinho'])->middleware('auth')->name('carrinho');

Route::get('/categoria/{categoria}', [KitsController::class, 'getKits'])->middleware('auth');

Route::get('/perfil/{id}', [PerfilController::class, 'index'])->middleware('auth');

//usar grupos para limitar acesso a certas rotas

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


Route::get('teste', function () {
    return session()->all();
});
