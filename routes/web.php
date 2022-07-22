<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\BilheteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;


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

//Rotas de frontend
Route::get("/", [FilmeController::class, 'index'])->name('filmes.index');
Route::get('filmes/{filme}', [FilmeController::class, 'show'])->name('filme.show');
Route::get('perfil', [ClienteController::class, 'index'])->name('cliente.perfil');
Route::post('perfil', [ClienteController::class, 'update'])->name('cliente.perfil.update');
Route::get('sessoes/{sessao}', [SessaoController::class, 'comprar_bilhete'])->name('sessao.comprar_bilhete');

Route::middleware('notFuncionario')->group(function () {
    // rotas relacionadas com a gestão do carrinho
    Route::get('carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::put('carrinho/{sessao}', [CarrinhoController::class, 'update_bilhete'])->name('carrinho.update_bilhete');
    Route::delete('carrinho/{row}', [CarrinhoController::class, 'destroy_bilhete'])->name('carrinho.destroy_bilhete');
    Route::post('carrinho/{sessao}/{lugar}', [CarrinhoController::class, 'store_bilhete'])->name('carrinho.store_bilhete');
    Route::delete('carrinho', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('users/password', [UserController::class, 'password'])->name('password');
    Route::put('users/password', [UserController::class, 'store_password'])->name('change.password');
});

Route::middleware('cliente')->group(function () {
    // rotas relacionadas com a gestão dos recibos
    Route::post('recibos/create', [ReciboController::class, 'create'])->name('recibos.create');
    Route::get('recibos/{recibo}', [ReciboController::class, 'show'])->name('recibo.show');
    Route::get('recibos', [ReciboController::class, 'index'])->name('recibos.index');

    // rotas relacionadas com a gestão dos bilhetes
    Route::get('bilhetes', [BilheteController::class, 'index'])->name('bilhetes.index');
});

Route::middleware('auth', 'verified')->prefix('painel')->name('admin.')->group(function () {
    // dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // filmes
    /*Route::get('filmes', [FilmeController::class, 'admin_index'])->name('filmes')
        ->middleware('can:viewAny,App\Models\Filme');
    Route::get('filmes/{filme}/edit', [FilmeController::class, 'edit'])->name('filmes.edit')
        ->middleware('can:view,filme');
    Route::get('filmes/create', [FilmeController::class, 'create'])->name('filmes.create')
        ->middleware('can:create,App\Models\Filme');
    Route::post('filmes', [FilmeController::class, 'store'])->name('filmes.store')
        ->middleware('can:create,App\Models\Filme');
    Route::put('filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update')
        ->middleware('can:update,filme');
    Route::delete('filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy')
        ->middleware('can:delete,filme');*/

    // administração de géneros
    /*Route::get('generos', [GeneroController::class, 'admin'])->name('generos')
        ->middleware('can:viewAny,App\Models\Genero');
    Route::get('generos/{genero}/edit', [GeneroController::class, 'edit'])->name('generos.edit')
        ->middleware('can:view,genero');
    Route::get('generos/create', [GeneroController::class, 'create'])->name('generos.create')
        ->middleware('can:create,App\Models\Genero');
    Route::post('generos', [GeneroController::class, 'store'])->name('generos.store')
        ->middleware('can:create,App\Models\Genero');
    Route::put('generos/{genero}', [GeneroController::class, 'update'])->name('generos.update')
        ->middleware('can:update,genero');
    Route::delete('generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.destroy')
        ->middleware('can:delete,genero');

    // admininstração de salas
    Route::get('salas', [SalaController::class, 'admin'])->name('salas')
        ->middleware('can:viewAny,App\Models\Sala');
    Route::get('salas/{sala}/edit', [SalaController::class, 'edit'])->name('salas.edit')
        ->middleware('can:view,sala');
    Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create')
        ->middleware('can:create,App\Models\Sala');
    Route::post('salas', [SalaController::class, 'store'])->name('salas.store')
        ->middleware('can:create,App\Models\Sala');
    Route::put('salas/{sala}', [SalaController::class, 'update'])->name('salas.update')
        ->middleware('can:update,sala');
    Route::delete('salas/{sala}', [SalaController::class, 'destroy'])->name('salas.destroy')
        ->middleware('can:delete,sala');

    // administração de clientes
    Route::get('perfil', [ClienteController::class, 'index'])->name('perfil');
    Route::get('clientes', [ClienteController::class, 'admin'])->name('clientes')
        ->middleware('can:viewAny,App\Models\Cliente');
    Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit')
        ->middleware('can:view,cliente');
    Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create')
        ->middleware('can:create,App\Models\Cliente');
    Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store')
        ->middleware('can:create,App\Models\Cliente');
    Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update')
        ->middleware('can:update,cliente');
    Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy')
        ->middleware('can:delete,cliente');
    Route::delete('clientes/{cliente}/foto_url', [ClienteController::class, 'destroy_foto'])->name('clientes.foto_url.destroy')
        ->middleware('can:update,cliente');*/
});

// rotas protegidas (só para admins)
/*Route::middleware(['admin'])->group(function () {

    // admin dashboard main page
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // rotas para gerir users no dashboard admin
    Route::resource('users', UserController::class)->except('show', 'update');
    Route::patch('users/{user}/update_state', [UserController::class, 'updateState'])->name('users.update_state');
});*/

Auth::routes();
