@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Tareas</h1>

    <!-- Botón para crear una nueva tarea -->
    <a href="{{ route('Task.nuevaTarea') }}" class="btn btn-primary mb-4">Nueva Tarea</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task['_id'] }}</td>
                    <td>{{ $task['title'] }}</td>
                    <td>{{ $task['description'] }}</td>
                    <td>{{ $task['status'] }}</td>
                    <td>{{ $task['created_at'] }}</td>
                    <td>{{ $task['updated_at'] }}</td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('Task.editarTareas', $task['_id']) }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('Task.eliminarTareas', $task['_id']) }}" class="btn btn-danger btn-sm">Eliminar</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
