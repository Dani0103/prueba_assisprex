<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function __construct(Type $var = null) {
        $this->var = $var;
        $this->consulta = 'http://localhost:3000/api/task/';
    }

    public function tareas(){

        $response = Http::get("{$this->consulta}tasks");

        if ($response->successful()) {

            $tasks = $response->json();

            return view('Task.tareas', compact('tasks'));
        } else {
            return view('Task.tareas', ['tasks' => []]);
        }
    }

    public function nuevaTarea()
    {
        return view('Task.nuevaTarea');
    }

    public function editarTareas($id) {

        $response = Http::get("{$this->consulta}tasks/{$id}");
    
        if ($response->successful()) {

            $task = $response->json();
    
            return view('Task.editarTarea', compact('task'));
        } else {

            return redirect()->route('Task.tareas')->with('error', 'Tarea no encontrada.');
        }
    }

    public function eliminarTareas($id) {

        $response = Http::get("{$this->consulta}tasks/{$id}");
    
        if ($response->successful()) {

            $task = $response->json();
    
            return view('Task.eliminarTarea', compact('task'));
        } else {

            return redirect()->route('Task.tareas')->with('error', 'Tarea no encontrada.');
        }
    }

    // Enviar los datos del formulario para crear la tarea
    public function enviarNuevaTarea(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:pendiente,completada',
        ]);

        // Preparar los datos de la tarea
        $data = $request->only(['title', 'description', 'status']);

        // Enviar la solicitud POST a la API para crear la tarea
        $response = Http::post("{$this->consulta}tasks", $data);

        if ($response->successful()) {
            // Si la creación fue exitosa, redirigir con mensaje de éxito
            return redirect()->route('Task.tareas')->with('success', 'Tarea creada correctamente.');
        } else {
            // Si hubo un error al crear, redirigir con mensaje de error
            return back()->with('error', 'Error al crear la tarea.');
        }
    }

    
    // Método para actualizar la tarea
    public function actualizarTareas(Request $request, $id) {
        // Preparar los datos para actualizar
        $data = $request->all();
    
        // Enviar los datos al API para actualizar la tarea
        $response = Http::put("{$this->consulta}tasks/{$id}", $data);
    
        if ($response->successful()) {
            // Si la actualización fue exitosa, redirigir con éxito
            return redirect()->route('Task.tareas')->with('success', 'Tarea actualizada correctamente.');
        } else {
            // Si hubo un error al actualizar, redirigir con un error
            return redirect()->route('Task.tareas')->with('error', 'Error al actualizar la tarea.');
        }
    }
    

    public function confirmarEliminarTareas($id) {
        // Enviar una solicitud DELETE al API para eliminar la tarea
        $response = Http::get("{$this->consulta}tasks/{$id}");
    
        if ($response->successful()) {
            // Si la eliminación fue exitosa, redirigir con éxito
            return redirect()->route('Task.tareas')->with('success', 'Tarea eliminada correctamente.');
        } else {
            // Si hubo un error al eliminar, redirigir con un error
            return redirect()->route('Task.tareas')->with('error', 'Error al eliminar la tarea.');
        }
    }
}
