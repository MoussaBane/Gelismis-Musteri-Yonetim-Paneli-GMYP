@extends('layouts.form')
@section('title', 'Kullanici Guncelleme Sayfasi')

@section('content')
    <div class="container">

        <div class="col-md-2"></div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>Kullanici Guncelleme Formu</b></h1>
                    </div>

                    <div class="card-body">


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {
                                    <h4>
                                        {{ $error }}
                                    </h4>
                                    }
                                @endforeach
                            </div>
                        @endif

                        <br><br>

                        <form action="{{ Route('kullanici.saveUpdate', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Adiniz"
                                    value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="---@--.com"
                                    value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Tel</label>
                                <input type="tel" name="tel" class="form-control" placeholder="05xxxxxxx"
                                    value="{{ $user->tel }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Role</label>
                                <input type="role" name="role" class="form-control" placeholder="amin | kullanici"
                                    value="{{ $user->role }}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="En az 6 Hane"
                                autocomplete="new-password" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="En az 6 Hane" id="password-confirm" autocomplete="new-password" required>
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
