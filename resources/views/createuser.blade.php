@extends('layouts.panel')

@section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function() {
    $(".op").click(function(){
      if ($(this).val()=='elementos'){
        $("#txtRol").removeAttr('disabled');
        $("#txtRol").focus();
      }
      else if ($(this).val()=='Administrador'){
        $("#txtRol").removeAttr('disabled');
        
      }else{
        $("#txtRol").attr('disabled','disabled');
      }
    })
  })
</script>
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
      <form role="form" autocomplete="off"  method="POST" action="{{ url('/createuser') }}">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="form-group">
              <label for="a_paterno">Apellido paterno</label>
              <input type="text" name="a_paterno" class="form-control" value="{{ old('a_paterno') }}" required>
            </div>
            <div class="form-group">
              <label for="a_materno">Apellido materno</label>
              <input type="text" name="a_materno" class="form-control" value="{{ old('a_materno') }}" required>
            </div>
          <button type="submit" class="btn btn-lg btn-success">Crear</button>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
              <label for="matricula">Matricula</label>
              <input type="text" name="matricula" class="form-control" value="{{ old('matricula') }}" required>
            </div>
            <div class="form-group">
              <label for="matricula">Rol: </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" class="op" name="rol" value="Administrador">
                <label for="customRadio5">Administrador</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" class="op" name="rol" value="elementos" checked>
                <label for="customRadio6">  Elementos</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" class="op" name="rol" value="empleados" checked>
                <label for="customRadio6">  Estudiantes</label>
 
            </div>
            <div class="form-group">
              <label for="matricula">Contraseña</label>
              <input id="txtRol" type="password" name="password" class="form-control" value="{{ old('password') }}" required disabled></input>
            </div>
          </div>
          
        </div>
      </form>
    </div>
  </div>

@endsection
