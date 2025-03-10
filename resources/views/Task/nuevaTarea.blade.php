@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Tarea</h1>

    <form action="{{ route('Task.enviarNuevaTarea') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pendiente">Pendiente</option>
                <option value="completada">Completada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Tarea</button>
    </form>
</div>
@endsection
