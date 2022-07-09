<?php
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\PublicacionController;
use App\http\Controllers\AsociacionController;
use App\http\Controllers\EvidenciaController;
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
Route::delete('/trabajos/destroy/{id}', [TrabajoController::class,'destroy'])->name('trabajos.destroy')->middleware('auth');

Route::get('administrador/mostrar', [AsociacionController::class,'mostrarUsuario'])->name('administrador.mostrar')->middleware('auth');
Route::get('administrador/guardar', [AsociacionController::class,'formulario'])->middleware('auth');
Route::post('administrador/guardar', [AsociacionController::class,'guardar'])->middleware('auth');
Route::put('/administrador/{usuario}/actualizar', [AsociacionController::class,'update'])->name('administrador.actualizar')->middleware('auth');

Route::get('/publicacion/{id}', [PublicacionController::class,'mostrar'])->name('publicacion')->middleware('auth');
Route::put('/publicacion/{id}/actualizar', [PublicacionController::class,'update'])->name('publicacion.actualizar')->middleware('auth');
Route::delete('/publicacion/destroy/{id}', [PublicacionController::class,'destroy'])->name('publicacion.destroy')->middleware('auth');


Route::get('/detalles/{id}', [EvidenciaController::class,'mostrar'])->name('detalles.mostrar')->middleware('auth');
Route::post('/detalles/{id}', [EvidenciaController::class,'guardar'])->name('detalles.guardar')->middleware('auth');
Route::put('/detalles/actualizar/{id}', [EvidenciaController::class,'update'])->name('detalles.actualizar')->middleware('auth');
Route::delete('/detalles/destroy/{id}', [EvidenciaController::class,'destroy'])->name('detalles.destroy')->middleware('auth');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
