@extends('layouts.form')
@php
    use Illuminate\Support\Carbon;
@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron">
                <h1 align="center" style="font-family: Arial Black; font-size:xx-large">
                    Admin
                </h1>
                <h1>
                    <hr style="color: black">
                </h1>
                <h1 align="center" style="font-family: Arial Black; font-size:xx-large">
                    Kullanici Paneli
                </h1>
            </div>
        </div>

        <br><br>

        <div class="row justify-content-end">
            <div class="col-auto col-8">
                <a href="{{ Route('kullanici.ekle') }}" class="btn btn-primary col-md-6">
                    <h3><b>KULLANICI EKLE</b></h3>
                </a>
            </div>
        </div>

        <br>

        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col" style="font-size: 16px;">#</th>
                        <th scope="col" style="font-size: 16px;">Name LastName</th>
                        <th scope="col" style="font-size: 16px;">Email</th>
                        <th scope="col" style="font-size: 16px;">Tel</th>
                        <th scope="col" style="font-size: 16px;">Role</th>
                        <th scope="col" style="font-size: 16px;">User Id</th>
                        <th scope="col" style="font-size: 16px;">Created At</th>
                        <th scope="col" style="font-size: 16px;">Last Login</th>
                        <th scope="col" style="font-size: 16px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row" style="font-size: 16px;">{{ $loop->iteration }}</th>
                            <td style="font-size: 16px;">{{ $user->name }}</td>
                            <td style="font-size: 16px;">{{ $user->email }}</td>
                            <td style="font-size: 16px;">{{ $user->tel }}</td>
                            <td style="font-size: 16px;">{{ $user->role }}</td>
                            <td style="font-size: 16px;" class="text-center">{{ $user->id }}</td>
                            <td style="font-size: 16px;">{{ $user->created_at }}</td>
                            <td style="font-size: 16px;">{{ Carbon::parse($user->last_login)->diffForHumans(null, true) }}
                                ago</td>
                            <td>
                                <a href="{{ route('kullanici.update', ['id' => $user->id]) }}"
                                    class="btn btn-primary col-md-7 mr-2">
                                    <h4><b>DUZENLE</b></h4>
                                </a>

                                <a href="{{ route('kullanici.delete', ['id' => $user->id]) }}"
                                    class="btn btn-danger col-md-5" onclick="return confirmUserDelete();">
                                    <h4><b>SIL</b></h4>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br><br><br><br><br>


        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <a href="{{ Route('musteri.ekle') }}" class="btn btn-primary col-md-4 me-4">
                    <h3><b>MUSTERI EKLE</b></h3>
                </a>

                <a href="{{ route('downloadCustomer') }}" class="btn btn-success col-md-3">
                    <div class="d-flex align-items-center">
                        <h3 class="me-2"><b>Liste Indir</b></h3>
                        <i class="fa fa-download fs-2"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-8 mb-3">
                <form action="{{ route('musteri.search') }}" method="get" class="d-flex">
                    <div class="input-group input-group-sm">
                        <input type="text" name="keyword" class="form-control" style="font-size: 18px;"
                            value='{{ old('keyword') }}' placeholder="Arama yap...">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-primary col-md-12" style="font-size: 18px;" value="Ara">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br>

        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                    <tr class="table-active">
                        <th scope="col" style="font-size: 16px;">#</th>
                        <th scope="col" style="font-size: 16px;">Responsible User_Id</th>
                        <th scope="col" style="font-size: 16px;">Name</th>
                        <th scope="col" style="font-size: 16px;">LastName</th>
                        <th scope="col" style="font-size: 16px;">Email</th>
                        <th scope="col" style="font-size: 16px;">Tel</th>
                        <th scope="col" style="font-size: 16px;">About</th>
                        <th scope="col" style="font-size: 16px;">Created At</th>
                        <th scope="col" style="font-size: 16px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row" style="font-size: 16px;">
                                {{ $loop->iteration }}
                                <a href="{{ Route('musteri.showCustomer', ['id' => $customer->id]) }}"
                                    class="btn btn-primary">
                                    <h4><b>View</b></h4>
                                </a>
                            </th>
                            <td class="text-center" style="font-size: 16px;">{{ $customer->user_id }}</td>
                            <td style="font-size: 16px;">{{ $customer->name }}</td>
                            <td style="font-size: 16px;">{{ $customer->lastname }}</td>
                            <td style="font-size: 16px;">{{ $customer->email }}</td>
                            <td style="font-size: 16px;">{{ $customer->tel }}</td>
                            <td style="font-size: 16px;">{{ $customer->about }}</td>
                            <td style="font-size: 16px;">{{ $customer->created_at }}</td>
                            <td>
                                <a href="{{ Route('musteri.update', ['id' => $customer->id]) }}"
                                    class="btn btn-primary col-md-8 mr-2">
                                    <h4><b>DUZENLE</b></h4>
                                </a>

                                <a href="{{ Route('musteri.delete', ['id' => $customer->id]) }}"
                                    class="btn btn-danger col-md-4" onclick="return confirmCustomerDelete();">
                                    <h4><b>SIL</b></h4>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br><br>

        @include('musteri_istatistikleri')

        <br><br>


    </div>
@endsection
