@extends('layouts.panel')

@section('content')
    
      <div class="row mt-12">
        <div class="col-xl-14 mb-6 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-1">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Administradores</h3>
                </div>
                <div class="col text-right">
                  <a  type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">
                    Nuevo
                  </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
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
                              <button type="submit" class="btn btn-success">Crear</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        <a href="{{ url('/admins/'.$admin->id.'/edit') }}"  class="btn btn-sm btn-default">Editar</a>
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