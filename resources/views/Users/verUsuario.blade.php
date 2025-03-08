@extends('layouts.app')
@section('content')

<h1>listado de usuarios</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nombre</th>
      <th scope="col">email</th>
      <th scope="col">contraseña</th>
      <th scope="col">Fecha creacion</th>
      <th scope="col">Fecha Actualizacion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Usuarios as $Usuario) 
    <tr>
      <th scope="row">{{ $Usuario->id}}</th>
      <td>{{ $Usuario->name}}</td>
      <td>{{ $Usuario->email}}</td>
      <td>{{ $Usuario->password}}</td>
      <td>{{ $Usuario->created_at}}</td>
      <td>{{ $Usuario->updated_at}}</td>
      <td>
        <div style="display: flex; gap: 10px;">
          <a href="{{ route('Users.actualizarUsuario', ['id' => $Usuario->id]) }}" class="btn btn-primary">Editar</a>
          <a href="{{ route('Users.eliminarUsuario', ['id' => $Usuario->id]) }}" class="btn btn-danger">Eliminar</a>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif


@endsection