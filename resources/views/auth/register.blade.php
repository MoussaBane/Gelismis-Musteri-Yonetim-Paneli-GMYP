@extends('layouts.app')

@section('title', 'Register Sayfasi')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>Register</b></h1>
                    </div>

                    <div class="card-body">

                        <br><br>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-4">
                                <label for="name" class="col-md-4 col-form-label text-md-end">
                                    <h3><b>User Name : </b></h3>
                                </label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror fs-4" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" placeholder="Ad Soyad"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end">
                                    <h3><b>Email Address :</b></h3>
                                </label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror fs-4" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="...@...com">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="tel" class="col-md-4 col-form-label text-md-end">
                                    <h3><b>Tel :</b></h3>
                                </label>

                                <div class="col-md-6">
                                    <input id="tel" type="text" class="form-control fs-4" name="tel"
                                        value="{{ old('tel') }}" required placeholder="Tel Like 05xxxxxxxxx">

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-end">
                                    <h3><b>Password :</b></h3>
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="En az 6 hane">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                    <h3><b>Confirm Password :</b></h3>
                                </label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <h3>
                                            <b>
                                                Register
                                            </b>
                                        </h3>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
