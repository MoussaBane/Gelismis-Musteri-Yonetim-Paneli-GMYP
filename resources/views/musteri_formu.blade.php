@extends('layouts.form')
@section('title', 'Musteri Ekleme Sayfasi')

@section('content')
    <div class="container">

        <div class="col-md-2"></div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>Musteri Ekleme Formu</b></h1>
                    </div>

                    <div class="card-body">
                        <br><br>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <h4>
                                        {{ $error }}
                                    </h4>
                                @endforeach
                            </div>
                        @endif

                        <br><br>

                        <form action="{{ Route('musteri.kaydet') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Ad</label>
                                <input type="text" name="name" class="form-control" placeholder="Adiniz"
                                    value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="lastname">Soyad</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Soyadiniz"
                                    value="{{ old('lastname') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="---@--.com"
                                    value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Tel</label>
                                <input type="text" name="tel" class="form-control" placeholder="05xxxxxxx"
                                    value="{{ old('tel') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="about">About</label>
                                <input type="text" name="about" class="form-control" placeholder="Bir Not Yazin"
                                    value="{{ old('about') }}" required>
                            </div>

                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <label for="user_id">User_Id</label>
                                    <input type="text" name="user_id" class="form-control"
                                        placeholder="Hangi Kullanicinin Sorumluluğuna ?" value="{{ old('user_id') }}"
                                        required>
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary col-md-3" value="Kaydet">
                                </div>

                                <a href="{{ Route('musteri.iptal') }}" class="btn btn-danger col-md-3">Iptal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2"></div>

    </div>
@endsection
