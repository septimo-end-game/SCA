@extends('layouts.panel')

@section('content')
    
      <div class="row mt-12">
        <div class="col-xl-12 mb-6 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-1">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo administrador</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('/admins') }}" class="btn btn-sm btn-danger">
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
            </div>
            <form action="{{ url('admins') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
              </div>
              <div class="form-group">
                <label for="a_paterno">Apellido paterno</label>
                <input type="text" name="a_paterno" class="form-control" value="{{ old('a_paterno') }}" required>
              </div>
              <div class="form-group">
                <label for="a_materno">Apellido materno</label>
                <input type="text" name="a_materno" class="form-control" value="{{ old('a_materno') }}" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
              </div>
              <div class="form-group">
                <label for="matricula">Matricula</label>
                <input type="text" name="matricula" class="form-control" value="{{ old('matricula') }}" require>
              </div>
              <button type="submit" class="btn btn-sm btn-success">Crear</button>
            </form>
          </div>
        </div>
      </div>
    
@endsection
