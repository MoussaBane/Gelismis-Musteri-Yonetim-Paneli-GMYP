@extends('layouts.app')
@section('title', 'Customer Sayfasi')

@section('content')



    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" align='center'>
                    <div class="row justify-content-center">
                        <div class="jumbotron">
                            <h1 align="center" style="font-family: Arial Black; font-size:xx-large">MUSTERI AYRINTILARI</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="font-family: Arial; font-size:large">

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="{{ Route('musteri.saveUpdate', ['id' => $customer->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" style="font-size: 18px;"
                                    placeholder="Adiniz" value="{{ $customer->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="lastname">LastName</label>
                                <input type="text" name="lastname" class="form-control" style="font-size: 18px;"
                                    placeholder="Soyadiniz" value="{{ $customer->lastname }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" style="font-size: 18px;"
                                    placeholder="---@--.com" value="{{ $customer->email }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tel">Tel</label>
                                <input type="tel" name="tel" class="form-control" style="font-size: 18px;"
                                    placeholder="05xxxxxxx" value="{{ $customer->tel }}" required>
                            </div>

                            <div class="form-group">
                                <label for="about">About</label>
                                <input type="text" name="about" class="form-control" style="font-size: 18px;"
                                    placeholder="...Musteriye Bir Not Ekle..." value="" required>
                            </div>

                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <label for="user_id">Hangi Kullanicinin Sorumluluğunda</label>
                                    <input type="text" name="user_id" class="form-control"
                                        placeholder="Hangi Kullanicinin Sorumluluğunda ?" value="{{ $customer->user_id }}"
                                        style="font-size: 18px;" required>
                                </div>
                            @endif


                            <div class="form-group">
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary col-md-3" value="Kaydet"
                                        style="font-size: 18px;">
                                </div>

                                <a href="{{ Route('musteri.iptal') }}" class="btn btn-danger col-md-3"
                                    style="font-size: 18px;">Geri_Don/Iptal</a>
                            </div>

                            <br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
