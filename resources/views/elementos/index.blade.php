@extends('layouts.panel')

@section('content')
    
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Elementos de seguridad</h3>
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
          @foreach ($users as $user)
          <tr>
            <th scope="row">
              {{  $user->name }}
            </th>
            <td>
              {{  $user->a_paterno }}
            </td>
            <td>
              {{  $user->email }}
            </td>
            <td>
              {{  $user->matricula }}
            </td>
            <td>
              <form action="{{ url('/elementos/'.$user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('/elementos/'.$user->id.'/edit') }}"  class="btn btn-sm btn-default">Editar</a>
                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
    
@endsection