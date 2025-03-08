<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//traer data
Route::get('/students', function(){
    return 'Lista estudiantes';
});
Route::get('/students/{id}', function(){
    return "Lista estudiantes por el dato";
});

//Crear data
Route::post('/createStudents', function(){
    return 'Creando estudiante';
});

//Actualizar data
Route::put('/updateStudent/{id}', function(){
    return 'Actualizando estudiantes';
});

//Eliminar data
Route::delete('/deleteStudents/{id}', function(){
    return 'Eliminando estudiante';
});