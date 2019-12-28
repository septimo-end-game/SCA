@extends('layouts.panel')

@section('content')

  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <a class="nav-link" href="{{ url('/empleados') }}">Empleados
        </div>
        <div class="col text-right">
          <a href="{{ url('createuser') }}" class="btn btn-sm btn-success">
            Nuevo
          </a>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Email</th>
            <th scope="col">Matricula</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($empleados as $empleado)
          <tr>
            <th scope="row">
              {{  $empleado->name }}
            </th>
            <td>
              {{  $empleado->a_paterno }}
            </td>
            <td>
              {{  $empleado->email }}
            </td>
            <td>
              {{  $empleado->matricula }}
            </td>
            <td>
              <form action="{{ url('/empleados/'.$empleado->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}"  class="btn btn-sm btn-default">Editar</a>
                <button class="btn btn-sm btn-danger" type="submit">Emininar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
    
@endsection