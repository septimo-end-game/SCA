<!-- Navigation -->

<ul class="navbar-nav">
@if (Auth::user()->rol == 'Administrador')
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/admins') }}">
      <i class="ni ni-glasses-2 text-default"></i> Administradores
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/elementos') }}">
      <i class="ni ni-circle-08 text-default"></i> Elementos
    </a>
  </li>
@endif

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/empleados') }}">
      <i class="ni ni-badge text-default"></i> Estudiantes
    </a>
  </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Documentación</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="ni ni-spaceship"></i> Acerca de
    </a>
  </li>
</ul>