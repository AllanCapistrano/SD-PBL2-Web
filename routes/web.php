<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NodeMCU\LampController;
use App\Http\Controllers\NodeMCU\TimerController;
use App\Http\Controllers\TariffController;

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

/*-------------------- Página principal --------------------------------------*/
/*Rota para acessar a página principal */
Route::get('/',[HomeController::class,'index'])->name('home');

/* Rota para alterar o estado atual da lâmpada */
Route::post('/toggleLamp', [LampController::class,'toggleLamp'])
    ->name('toggleLamp');

Route::post('/timer', [TimerController::class, 'setTimer'])->name('timer');

/*----------------------------------------------------------------------------*/

/*-------------------- Página História ---------------------------------------*/
/*Rota para acessar a página de histórico */
Route::get('/historic',[HomeController::class,'historic'])->name('historic');
Route::post('historic/tariff/store', [TariffController::class, 'store'])->name('tariff.store');

/*----------------------------------------------------------------------------*/

/*-------------------- Página Horários ---------------------------------------*/
/*Rota para acessar a página de horários */
Route::get('/schedule',[HomeController::class,'schedule'])->name('schedule');

/*----------------------------------------------------------------------------*/
