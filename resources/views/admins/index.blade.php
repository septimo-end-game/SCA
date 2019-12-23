@extends('layouts.panel')

@section('content')
    
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Administradores</h3>
        </div>
        <div class="col text-right">
          <a  href="{{ url('createuser') }}" class="btn btn-sm btn-success">
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
          @foreach ($admins as $admin)
          <tr>
            <th scope="row">
              {{  $admin->name }}
            </th>
            <td>
              {{  $admin->a_paterno }}
            </td>
            <td>
              {{  $admin->email }}
            </td>
            <td>
              {{  $admin->matricula }}
            </td>
            <td>
              <form action="{{ url('/admins/'.$admin->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('/admins/'.$admin->id.'/edit') }}" class="btn btn-sm btn-default">Editar</a>
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