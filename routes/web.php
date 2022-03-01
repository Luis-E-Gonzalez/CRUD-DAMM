<?php

use App\Http\Controllers\AlumnoController;
use App\Models\Alumno;
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

Route::name('lista')->get('/',[AlumnoController::class,'lista']);
Route::name('detalle')->get('/detalle/{id}',[AlumnoController::class,'detalle']);

Route::name('nuevo')->get('/nuevo',[AlumnoController::class,'nuevo']);
Route::name('guardar')->post('/guardar',[AlumnoController::class,'guardar']);

Route::name('editar')->get('/editar/{id}',[AlumnoController::class,'editar']);
Route::name('salvar')->put('/salvar/{id}',[AlumnoController::class,'salvar']);

Route::name('borrar1')->delete('/borrar/{id}',[AlumnoController::class,'borrar']);
Route::name('borrar2')->get('/borrar2/{id}',[AlumnoController::class,'borrar']);