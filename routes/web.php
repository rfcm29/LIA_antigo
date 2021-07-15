<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Carrinho;
use App\Http\Controllers\CarrinhoEspacoController;
use App\Http\Controllers\CentroCustos;
use App\Http\Controllers\EspacoLiaController;
use App\Http\Controllers\KitsController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReservarEspacoController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UsersController;
use App\Models\ReservarEspaco;
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

Route::get('/categoria/{categoria}', [KitsController::class, 'getKits']);
Route::get('/kit/{id}', [KitsController::class, 'showKit']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/carrinho', [Carrinho::class, 'showCarrinho'])->name('carrinho');
    Route::post('/carrinho', [Carrinho::class, 'criaCarrinho'])->name('cria.carrinho');
    Route::post('/cancelaReserva', [Carrinho::class, 'cancelaReserva'])->name('cancela.reserva');
    Route::post('/addCarrinho/{id}', [Carrinho::class, 'adicionaItem']);
    Route::post('/removeKit/{id}', [Carrinho::class, 'removeKit'])->name('removeKit');
    Route::get('/confirmarReserva', function() { return view('user.carrinho.confirmaReserva'); });
    Route::post('/confirmaReserva', [Carrinho::class, 'confirmaReserva']);

    Route::get('/perfil/{id}', [PerfilController::class, 'index'])->middleware('auth');
});

//usar grupos para limitar acesso a certas rotas

Route::group(['middleware' => ['UserTypeCheck']], function () {
    Route::get('/reservarEspaco', [CarrinhoEspacoController::class, 'index']);
    Route::post('/reservarEspaco', [CarrinhoEspacoController::class, 'criaCarrinho'])->name('cria.carrinhoEspaco');
    Route::post('/cancelarReservaEspaco', [CarrinhoEspacoController::class, 'cancelarReserva']);
    Route::post('/adicionaEspaco/{id}', [CarrinhoEspacoController::class, 'adicionarEspacoCarrinho']);
    Route::post('/confirmarReservaEspaco', [CarrinhoEspacoController::class, 'confirmarReserva']);
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

    //espacos LIA
    Route::resource('admin/espacoLia', EspacoLiaController::class);

    //reservas do espaco LIA
    Route::resource('admin/reservaEspaco', ReservarEspacoController::class);

    Route::get('/admin/home', function(){
        return view('admin.home');
    })->name('admin.home');
});


Route::get('teste', function () {
    return session()->all();
});
