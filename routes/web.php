<?php

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

Route::get('/{slug}', [\App\Http\Controllers\SiteController::class, 'index'])->name("site.index");
Route::post('/api/click', [\App\Http\Controllers\SiteController::class, 'click'])->name("site.click");

Route::get('/sistema/login', [\App\Http\Controllers\PainelController::class, 'login'])->name("painel.login");
Route::post('/sistema/logar', [\App\Http\Controllers\PainelController::class, 'logar'])->name("painel.logar");

Route::middleware(['admin'])->group(function () {
    Route::get('/sistema/inicio', [\App\Http\Controllers\PainelController::class, 'index'])->name("painel.index");
    Route::get('/sistema/sair', [\App\Http\Controllers\PainelController::class, 'sair'])->name("painel.sair");

    //LEADS GERAIS
    Route::get('/sistema/leads', [\App\Http\Controllers\PainelController::class, 'leads'])->name("painel.leads");
    
    // ROTAS DE USUARIOS
    Route::get('/sistema/usuarios/cadastro', [\App\Http\Controllers\UsuariosController::class, 'cadastro'])->name("painel.usuario.cadastro");
    Route::post('/sistema/usuarios/cadastrar', [\App\Http\Controllers\UsuariosController::class, 'cadastrar'])->name("painel.usuario.cadastrar");
    Route::get('/sistema/usuarios', [\App\Http\Controllers\UsuariosController::class, 'consultar'])->name("painel.usuarios");
    Route::get('/sistema/usuarios/editar/{usuario}', [\App\Http\Controllers\UsuariosController::class, 'editar'])->name("painel.usuario.editar");
    Route::post('/sistema/usuarios/salvar/{usuario}', [\App\Http\Controllers\UsuariosController::class, 'salvar'])->name("painel.usuario.salvar");
    
    // ROTAS DE CLIENTES
    Route::get('/sistema/clientes', [\App\Http\Controllers\ClientesController::class, 'consultar'])->name("painel.clientes");
    Route::get('/sistema/clientes/cadastro', [\App\Http\Controllers\ClientesController::class, 'cadastro'])->name("painel.cliente.cadastro");
    Route::post('/sistema/clientes/cadastrar', [\App\Http\Controllers\ClientesController::class, 'cadastrar'])->name("painel.cliente.cadastrar");
    Route::get('/sistema/clientes/relatorio/{cliente}', [\App\Http\Controllers\ClientesController::class, 'relatorio'])->name("painel.cliente.relatorio");
    Route::get('/sistema/clientes/editar/{cliente}', [\App\Http\Controllers\ClientesController::class, 'editar'])->name("painel.cliente.editar");
    Route::post('/sistema/clientes/salvar/{cliente}', [\App\Http\Controllers\ClientesController::class, 'salvar'])->name("painel.cliente.salvar");
    Route::post('/sistema/clientes/rede/{cliente}', [\App\Http\Controllers\ClientesController::class, 'rede'])->name("painel.cliente.getree.rede");
    Route::post('/sistema/clientes/rede/adicionar/{cliente}', [\App\Http\Controllers\ClientesController::class, 'adicionar_rede'])->name("painel.cliente.rede.adicionar");
    Route::post('/sistema/clientes/rede/salvar/{elemento}', [\App\Http\Controllers\ClientesController::class, 'salvar_rede'])->name("painel.cliente.rede.salvar");
    Route::get('/sistema/clientes/rede/remover/{elemento}', [\App\Http\Controllers\ClientesController::class, 'remover_rede'])->name("painel.cliente.rede.remover");
    Route::get('/sistema/clientes/leads/{cliente}', [\App\Http\Controllers\ClientesController::class, 'leads'])->name("painel.cliente.leads");

    // ROTA DE LOG
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});