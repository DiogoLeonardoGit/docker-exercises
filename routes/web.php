<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetoController;


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

Route::get('/', [ProjetoController::class, 'index'])->name('projects.index');
#Route::get('/projetos/create', [ProjetoController::class, 'create'])->name('projects.create'); // comentar para produção
#Route::post('/projetos', [ProjetoController::class, 'store'])->name('projects.store'); // comentar para produção
