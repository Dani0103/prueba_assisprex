@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tarea</h1>

    <form action="{{ route('Task.update', $task['_id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task['title'] }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description">{{ $task['description'] }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Estado</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pendiente" {{ $task['status'] == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="completada" {{ $task['status'] == 'completada' ? 'selected' : '' }}>Completada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Tarea</button>
    </form>
</div>
@endsection
