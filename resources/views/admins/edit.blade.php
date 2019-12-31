@extends('layouts.panel')

@section('content')

  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Editar administradores</h3>
        </div>
        <div class="col text-right">
          <a href="{{ url('admins') }}" class="btn btn-sm btn-danger">
            Cancelar y volver
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form method="post" action="{{ url('admins/'.$admin->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
            </div>
            <div class="form-group">
              <label for="a_paterno">Apellido paterno</label>
              <input type="text" name="a_paterno" class="form-control" value="{{ $admin->a_paterno }}" required>
            </div>
            <div class="form-group">
              <label for="a_materno">Apellido materno</label>
              <input type="text" name="a_materno" class="form-control" value="{{ $admin->a_materno }}" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
            </div>
            <div class="form-group">
              <label for="matricula">Matricula</label>
              <input type="text" name="matricula" class="form-control" value="{{ $admin->matricula }}" required>
            </div>
            <div class="form-group">
              <label for="matricula">Contraseña</label>
              <input type="password" name="password" class="form-control" value="" placeholder="Ingrese un valor solo si desea modificar la contraseña" ></input>
            </div>
            <button type="submit" class="btn btn-lg btn-success">Actualizar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection


