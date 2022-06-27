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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){

    Route::prefix('paises')->name('paises')->group(function (){
        Route::get('/', [FuncionariosController::class,'index'])->name('index');
        Route::get('/create', [FuncionariosController::class,'create'])->name('create');
        Route::post('/', [FuncionariosController::class,'store'])->name('store');
        Route::get('/{id}/edit', [FuncionariosController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [FuncionariosController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [FuncionariosController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });

    Route::prefix('estados')->name('estados')->group(function (){
        Route::get('/', [FuncionariosController::class,'index'])->name('index');
        Route::get('/create', [FuncionariosController::class,'create'])->name('create');
        Route::post('/', [FuncionariosController::class,'store'])->name('store');
        Route::get('/{id}/edit', [FuncionariosController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [FuncionariosController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [FuncionariosController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });

    Route::prefix('cidades')->name('cidades')->group(function (){
        Route::get('/', [FuncionariosController::class,'index'])->name('index');
        Route::get('/create', [FuncionariosController::class,'create'])->name('create');
        Route::post('/', [FuncionariosController::class,'store'])->name('store');
        Route::get('/{id}/edit', [FuncionariosController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [FuncionariosController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [FuncionariosController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });

    Route::prefix('clientes')->name('clientes')->group(function (){
        Route::get('/', [FuncionariosController::class,'index'])->name('index');
        Route::get('/create', [FuncionariosController::class,'create'])->name('create');
        Route::post('/', [FuncionariosController::class,'store'])->name('store');
        Route::get('/{id}/edit', [FuncionariosController::class, 'edit'])->where('id', '[0-9]+')->name('edit');
        Route::put('/update/{id}', [FuncionariosController::class, 'update'])->where('id', '[0-9]+')->name('update');
        Route::delete('/{id}', [FuncionariosController::class,'destroy'])->where('id', '[0-9]+')->name('destroy');
    });
});


require __DIR__.'/auth.php';
