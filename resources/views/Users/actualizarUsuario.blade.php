@extends('layouts.app')
@section('content')

<h1>Actualizar Usuario</h1>

<form method="POST" action="{{ route('Users.guardarActualizacion', ['id' => $actualizar->id]) }}">
    @csrf
    @method('PUT') 

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $actualizar->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $actualizar->email }}" required>
    </div>

    <div class="form-group">
        <label for="password">Nueva Contraseña:</label>
        <input type="password" name="password" id="password" class="form-control">
        <small>Deja en blanco si no deseas cambiar la contraseña</small>
    </div>

    <button type="submit" class="btn btn-success mt-3">Guardar Cambios</button>
    <a href="{{ route('Users.verUsuario') }}" class="btn btn-secondary mt-3">Cancelar</a>
</form>

@endsection
