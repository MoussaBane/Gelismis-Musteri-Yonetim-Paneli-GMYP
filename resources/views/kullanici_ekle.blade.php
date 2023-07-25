@extends('layouts.form')
@section('title', 'Kullanici Ekleme Sayfasi')

@section('content')
    <div class="container">

        <div class="col-md-2"></div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>Kullanici Ekleme Formu</b></h1>
                    </div>

                    <div class="card-body">


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            <h4>
                                                {{ $error }}
                                            </h4>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br><br>

                        <form action="{{ Route('kullanici.kaydet') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Adiniz"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="---@--.com"
                                    value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Tel</label>
                                <input type="tel" name="tel" class="form-control" placeholder="05xxxxxxx"
                                    value="{{ old('tel') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="En az 6 Hane"
                                autocomplete="new-password" value="{{ old('password') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="En az 6 Hane" id="password-confirm" autocomplete="new-password" value="{{ old('password_confirmation') }}" required>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary col-md-3" value="Kaydet">
                                </div>

                                <a href="{{ Route('iptal') }}" class="btn btn-danger col-md-3">Iptal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>

    </div>
@endsection
