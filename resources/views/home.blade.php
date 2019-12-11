@extends('layouts.panel')

@section('content')
    
      <div class="row mt-12">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Estudiantes</h3>
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
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Matricula</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      Vero
                    </th>
                    <td>
                      Chiquistrikis
                    </td>
                    <td>
                      de Cris
                    </td>
                    <td>
                      201645636345
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Adan
                    </th>
                    <td>
                      Vargas
                    </td>
                    <td>
                      Cruz
                    </td>
                    <td>
                      20163984938
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
@endsection
