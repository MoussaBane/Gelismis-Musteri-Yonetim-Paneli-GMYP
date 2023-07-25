@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- { role amin degilse kullanici demektir (amin|kullan) --}}

            @if (Auth::user()->role == 'admin')
                @include('admin_sayfasi')
            @else
                @include('kullanici_sayfasi')
            @endif

        </div>

        <br><br>


    </div>
@endsection
