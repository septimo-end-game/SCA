@extends('layouts.form')

@section('content')
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
            @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                    <strong>Recorcholis! </strong>Usuario y/o Contraseña incorrecta
                </div>
            @else
              <div class="text-center text-muted mb-4">
                Logueate
              </div>
            @endif


              <form role="form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Correo" required autofocus>

                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-success my-4">Entrar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
                @if (Route::has('password.request'))
                    <a class="text-light" href="{{ route('password.request') }}">
                        Recuperar contraseña
                    </a>
                @endif
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('register') }}" class="text-light">Registrate</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
