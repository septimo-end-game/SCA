<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>SCA</title>
  <!-- Favicon -->
  <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
</head>

<body>
  <script type="text/javascript">
  focus = function getFocus() {           
    document.getElementById("myTextField").focus();
  }
  </script>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    @if (Auth::user()->rol == 'Administrador')
    <div class="col-6 collapse-brand center">
      <a href="{{ url('/empleados') }}">
        <h1 class="text-default">SCA</h1>
      </a>
    </div>
    @endif
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <a href="{{ url('/logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>
                <span>Cerrar sesión</span>
              </a>
              <form action="{{ url('/logout') }}" method="POST"  style="display: none;" id="logout-form">
                @csrf
                <input type="submit" value="logout" style="display: none;">
              </form>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ url('/empleados') }}">
                <h1 class="text-default">SCA</h1>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form buscar -->
      <form class="mt-4 mb-3 d-md-none" method="GET" action="{{ url('/empleados/') }}">
        <div class="input-group input-group-rounded input-group-merge">
          <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Buscar" aria-label="Search" onload="focus()">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-search"></span>
            </div>
          </div>
        </div>
      </form>
        @include('includes.panel.menu')
      </div>

    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">{{Auth::user()->rol}}</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" method="GET" action="{{ url('/empleados/') }}">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input id="myTextField" class="form-control"  type="text" name="matricula" required="" autofocus>
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <a href="{{ url('/logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>
                <span>Cerrar sesión</span>
              </a>
              <form action="{{ url('/logout') }}" method="POST" style="display: none;" id="logout-form">
                @csrf
                <input type="submit" value="logout" style="display: none;">
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-default pb-6 pt-5 pt-md-8">

    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <a class="nav-link" href="{{ url('/empleados') }}">Estudiantes
        </div>
        @if (Auth::user()->rol == 'Administrador')
        <div class="col text-right">
          <a href="{{ url('createuser') }}" class="btn btn-sm btn-success">
            Nuevo
          </a>
        </div>
        @endif
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
            @if (Auth::user()->rol == 'Administrador')
            <th scope="col">Opciones</th>
            @endif
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
            @if (Auth::user()->rol == 'Administrador')
            <td>
              <form action="{{ url('/empleados/'.$empleado->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}"  class="btn btn-sm btn-default">Editar</a>
                <button class="btn btn-sm btn-danger" type="submit">Emininar</button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
    
    </div>
  </div>
  <!-- Argon Scripts -->

  <!-- Core -->
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>
</body>

</html>