@extends('layouts.app')
@section('content')

<h1>Eliminar Usuario</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">¿Estás seguro de que deseas eliminar este usuario?</h5>
        <p><strong>Nombre:</strong> {{ $eliminar->name }}</p>
        <p><strong>Email:</strong> {{ $eliminar->email }}</p>

        <form method="POST" action="{{ route('Users.eliminarUsuarioSQL', ['id' => $eliminar->id]) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('Users.verUsuario') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

@endsection
