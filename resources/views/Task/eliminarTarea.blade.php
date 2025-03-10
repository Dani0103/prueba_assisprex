@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Confirmación de Eliminación</h1>

    <div class="alert alert-warning">
        <h3>¿Estás seguro de eliminar esta tarea?</h3>
        <p><strong>Título:</strong> {{ $task['title'] }}</p>
        <p><strong>Descripción:</strong> {{ $task['description'] }}</p>
        <p><strong>Estado:</strong> {{ $task['status'] }}</p>
        <p><strong>Fecha de Creación:</strong> {{ $task['created_at'] }}</p>
        <p><strong>Fecha de Actualización:</strong> {{ $task['updated_at'] }}</p>
    </div>

    <form action="{{ route('Task.confirmarEliminarTarea', $task['_id']) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta tarea?')">
        @csrf
        @method('DELETE') <!-- Indica que se enviará una solicitud DELETE -->
        
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('Task.tareas') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
