@extends('layouts.app')
@section('title', 'Kullanici Profil Sayfasi')

@section('content')



    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('success'))
                <div class="alert alert-success" align='center'>
                    <h3>
                        <b>
                            {{ session('success') }}
                        </b>
                    </h3>
                </div>
            @endif

            <div class="card">
                <div class="card-header" align='center'>
                    <div class="row justify-content-center">
                        <div class="jumbotron">
                            <h1 align="center" style="font-family: Arial Black; font-size:xx-large">Profil Sayfasi</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="font-family: Arial; font-size:large">


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

                    <div class="col-md-4">
                        <form action="{{ route('updateProfileImage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="profil_resmi">
                                <img src="{{ asset('profile_images/' . $user->image) }}" alt="Profil"
                                    class="img-thumbnail">
                                <input type="file" name="profil_resmi" id="profil_resmi" style="display: none;"
                                    onchange="this.form.submit();">
                            </label>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary"
                                    onclick="document.getElementById('profil_resmi').click()"><b>Profil
                                        Guncelle</b></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <form action="{{ Route('kullanici.saveUpdate', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" style="font-size: 18px;"
                                    placeholder="Adiniz" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" style="font-size: 18px;"
                                    placeholder="---@--.com" value="{{ $user->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Tel</label>
                                <input type="tel" name="tel" class="form-control" style="font-size: 18px;"
                                    placeholder="05xxxxxxx" value="{{ $user->tel }}" required>
                            </div>

                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <label for="tel">Role</label>
                                    <input type="role" name="role" class="form-control" style="font-size: 18px;"
                                        placeholder="amin | kullanici" value="{{ $user->role }}" required>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="tel">Role</label>
                                    <input type="role" name="role" class="form-control" style="font-size: 18px;"
                                        readonly id="staticEmail" value="{{ $user->role }}" required>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" style="font-size: 18px;"
                                    placeholder="En az 6 Hane" autocomplete="new-password" value="{{ $user->password }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    style="font-size: 18px;" placeholder="En az 6 Hane" id="password-confirm"
                                    autocomplete="new-password" value="" required>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary col-md-3"
                                        style="font-size: 18px;" value="Kaydet">
                                </div>

                                <a href="{{ Route('iptal') }}" class="btn btn-danger col-md-3"
                                    style="font-size: 18px;">Iptal</a>
                            </div>

                            <br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
