@extends('layouts.app')
@section('title', 'PassWord Reset')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>Reset Password</b></h1>
                    </div>

                    <div class="card-body">

                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                <h4>{{ $errors->first('error') }}</h4>
                            </div>

                            <br><br>
                        @else
                            <br><br>
                        @endif

                        <form method="POST" action="{{ route('passwordconfirmed') }}">
                            @csrf

                            {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                            <div class="row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-end">
                                    {{-- <h3>{{ __('Email Address') }} : </h3> --}}
                                    <h3><b>Email Address</b></h3>
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
                                <label for="password" class="col-md-4 col-form-label text-md-end">
                                    <h3><b>Password</b></h3>
                                </label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" value="{{ old('password') }}"
                                        placeholder="En Az 6 Hane">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                    <h3><b>Confirm Password</b></h3>
                                </label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <h3><b>Reset Password</b></h3>
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
