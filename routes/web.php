<?php

use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Vistas
Route::get('/Users/crearUsuario', [UsersController::class, 'crear'])->name('Users.crearUsuario');
Route::get('/Users/verUsuario', [UsersController::class, 'ver'])->name('Users.verUsuario');
Route::get('/Users/actualizarUsuario/{id}', [UsersController::class, 'actualizar'])->name('Users.actualizarUsuario');
Route::get('/Users/eliminarUsuario/{id}', [UsersController::class, 'eliminar'])->name('Users.eliminarUsuario');
Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/Task/tareas', [UsersController::class, 'tareas'])->name('Task.tareas');

//Crear usuario
Route::post('/Users/crearUsuarioPost', [UsersController::class, 'crearNuevoUsuario'])->name('Users.crearNuevoUsuario');

//Actualizar usuario
Route::put('/Users/guardarActualizacion/{id}', [UsersController::class, 'guardarActualizacion'])->name('Users.guardarActualizacion');

//Eliminar usuario
Route::delete('/Users/eliminarUsuarioSQL/{id}', [UsersController::class, 'eliminarUsuarioSQL'])->name('Users.eliminarUsuarioSQL');

//Validar usuario correcto
Route::post('/Users/validarUsuario', [UsersController::class, 'validarUsuario'])->name('Users.validarUsuario');