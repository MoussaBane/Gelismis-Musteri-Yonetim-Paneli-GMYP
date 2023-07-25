@extends('layouts.app')

@section('title', 'Login Sayfasi')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>Login</b></h1>
                    </div>

                    <div class="card-body">

                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                <h4>{{ $errors->first('error') }}</h4>
                            </div>

                            <br><br>
                        @elseif (session('status'))
                            <div class="alert alert-success">
                                <h4>{{ session('status') }}</h4>
                            </div>

                            <br><br>
                        @else
                            <br><br>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="row mb-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">
                                        <h3><b>User Name :</b></h3>
                                    </label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control fs-4" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">
                                        <h3><b>Password : </b></h3>
                                    </label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                <h4>{{ __('Remember Me') }}</h4>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-8 offset-md-4">

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">
                                                <h3><b>{{ __('Login') }}</b></h3>
                                            </button>
                                        </div>

                                        @if (Route::has('password.reset'))
                                            <a class="btn btn-link" href="{{ route('password.reset') }}">
                                                <h3>{{ __('Forgot Your Password?') }}</h3>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br><br>

                            <div align='center'>
                                <h2><b>--------------------------- OR ---------------------------</b></h2>
                            </div>

                            <br><br>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3">
                                    <a href="{{ Route('login.google') }}" class="btn btn-danger btn-block google-button">
                                        <h3>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                viewBox="0 0 48 48">
                                                <path fill="#ffffff"
                                                    d="M43.2 20.8H24V28h10.2c-0.3 2.6-2.7 7.2-10.2 7.2-6 0-11-4.9-11-11s4.9-11 11-11c2.8 0 5.4 1 7.5 2.8l5.7-5.7C36 4.4 30.5 2 24 2 12.9 2 4 10.9 4 20s8.9 18 20 18c11 0 19.7-8.9 19.7-18 0-1.2-0.2-2.4-0.5-3.6z" />
                                                <path fill="#ffffff" d="M6 12v4h10v-4H6zm0 8v4h10v-4H6zm0 8v4h10v-4H6z" />
                                            </svg>

                                            &nbsp;

                                            <b>Google</b>
                                        </h3>
                                    </a>
                                    <a href="{{ Route('login.facebook') }}" class="btn btn-primary btn-block">

                                        <h3>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                            </svg>

                                            &nbsp;

                                            <b>Facebook</b>
                                        </h3>
                                    </a>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
