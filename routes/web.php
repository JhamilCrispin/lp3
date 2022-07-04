<?php
use App\Http\Controllers\TrabajoController;
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
    return view('auth.login');
});

Route::get('/trabajos/ver', [TrabajoController::class,'mostrar'])->name('trabajos.ver')->middleware('auth');

Route::get('/trabajos/guardar', [TrabajoController::class,'formulario'])->name('trabajos.guardar')->middleware('auth');
Route::post('/trabajos/guardar', [TrabajoController::class,'guardar'])->name('trabajos.guardar')->middleware('auth');
Route::put('/trabajos/{mascota}/actualizar', [TrabajoController::class,'update'])->name('trabajos.actualizar')->middleware('auth');
Route::delete('/trabajos/destroy/{id}', [TrabajoController::class,'destoy'])->name('trabajos.destroy')->middleware('auth');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
