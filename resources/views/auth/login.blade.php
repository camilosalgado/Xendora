@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
         <div class="col-xl-3 col-lg-12 col-xs-12 col-sm-12 col-md-12 d-flex align-items-center justify-content-center" style="height: 100vh !important;border-right: 1px solid rgba(0,0,0,0.2);">
            <div class="card" style="width: 80%; background: transparent !important; border: none !important;">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                          <div class="col-md-12 text-center">
                              <div class="row">
                                  <div class="col-md-12">
                                      <h2 style="font-weight: bolder; text-align: center;">Bienvenido a</h2>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12" style="padding: 0; margin: 0">
                                      <img class="mb-3" height="100px" src="{{ asset('assets/images/logo.png') }}" alt="LoginLogoWithName">
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="form-group row">
                             <div class="col-md-12">
                               <input placeholder="Ingrese su usuario" id="usuario" type="text"
                                           class="form-control form @error('usuario') is-invalid @enderror"
                                           name="usuario" value="{{ old('usuario') }}" required autocomplete="off"
                                           autofocus>

                                    @error('usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                             </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-9">

        </div>
    </div>
</div>
@endsection
