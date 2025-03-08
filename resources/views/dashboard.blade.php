@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Panel de Control</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <!-- Gestión de Tareas -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Gestión de Tareas</div>
                <div class="card-body">
                    <p>Administra las tareas y asignaciones pendientes.</p>
                    <a href="{{ route('Task.tareas') }}" class="btn btn-primary">Ir a Tareas</a>
                </div>
            </div>
        </div>

        <!-- Administración de Usuarios -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">Administrar Usuarios</div>
                <div class="card-body">
                    <p>Gestiona los usuarios registrados en la plataforma.</p>
                    <a href="{{ route('Users.verUsuario') }}" class="btn btn-success">Administrar Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
