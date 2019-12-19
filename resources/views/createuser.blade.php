@extends('layouts.panel')

@section('content')
    

          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo usuario</h3>
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
              <form role="form"  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                  <div class="col-md-6">
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
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                      <label for="matricula">Matricula</label>
                      <input type="text" name="matricula" class="form-control" value="{{ old('matricula') }}" required>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-lg btn-success center">Crear</button>
                </div>
              </form>
            </div>
          </div>
    
@endsection
