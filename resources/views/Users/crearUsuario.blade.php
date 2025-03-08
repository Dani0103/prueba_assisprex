@extends('layouts.app')
@section('content')

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <form method="POST" action="{{ route('Users.crearNuevoUsuario')}}">
        @csrf
        <div class="form-group">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" class="form-control" required>
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" class="form-control" required>
</div>
<div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password" class="form-control" required>
</div>
        <button type="submit" class="form-control btn btn-primary">Guardar</button>
    </form>
    @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{session('success')}}
    </div>
    @endif
  </div>
</div>
@endsection