<?php

use App\Http\Controllers\CidadesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaisesController;
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

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::prefix('paises')->name('paises.')->group(function (){
        Route::get('/', [PaisesController::class,'index'])->name('index');
        Route::get('/create', [PaisesController::class,'create'])->name('create');
        Route::post('/', [PaisesController::class,'store'])->name('store');
        Route::get('/{id}/edit', [PaisesController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [PaisesController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [PaisesController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });

    Route::prefix('estados')->name('estados.')->group(function (){
        Route::get('/', [EstadosController::class,'index'])->name('index');
        Route::get('/create', [EstadosController::class,'create'])->name('create');
        Route::post('/', [EstadosController::class,'store'])->name('store');
        Route::get('/{id}/edit', [EstadosController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [EstadosController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [EstadosController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });

    Route::prefix('cidades')->name('cidades.')->group(function (){
        Route::get('/', [CidadesController::class,'index'])->name('index');
        Route::get('/create', [CidadesController::class,'create'])->name('create');
        Route::post('/', [CidadesController::class,'store'])->name('store');
        Route::get('/{id}/edit', [CidadesController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [CidadesController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [CidadesController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });

    Route::prefix('clientes')->name('clientes.')->group(function (){
        Route::get('/', [ClientesController::class,'index'])->name('index');
        Route::get('/create', [ClientesController::class,'create'])->name('create');
        Route::post('/', [ClientesController::class,'store'])->name('store');
        Route::get('/{id}/edit', [ClientesController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [ClientesController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [ClientesController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });
});


require __DIR__.'/auth.php';
