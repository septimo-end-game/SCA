@extends('layouts.panel')

@section('content')
    
      <div class="row mt-12">
        <div class="col-xl-14 mb-6 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-1">
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
                  @foreach ($elementos as $elemento)
                  <tr>
                    <th scope="row">
                      {{  $elemento->name }}
                    </th>
                    <td>
                      {{  $elemento->a_paterno }}
                    </td>
                    <td>
                      {{  $elemento->email }}
                    </td>
                    <td>
                      {{  $elemento->matricula }}
                    </td>
                    <td>
                      <form action="{{ url('/elementos/'.$elemento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/elementos/'.$elemento->id.'/edit') }}"  class="btn btn-sm btn-default">Editar</a>
                        <button class="btn btn-sm btn-danger" type="submit">Emininar</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
@endsection