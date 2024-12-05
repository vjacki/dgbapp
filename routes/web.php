<?php

use App\Http\Controllers\MovementController;
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
   return redirect()->route('movements.index');
});

Route::get('/Movement', [MovementController::class, 'index'])->name('movements.index');
route::post('/Movement', [MovementController::class, 'store'])->name('movements.store');
route::put('/Movement/{id}', [MovementController::class, 'update'])->name('movements.update');
route::delete('/Movement/{id}', [MovementController::class, 'destroy'])->name('movements.destroy');
Route::get('/Movement/Create', [MovementController::class, 'create'])->name('movements.create');
Route::get('/Movement/Edit/{id}', [MovementController::class, 'edit'])->name('movements.edit');


