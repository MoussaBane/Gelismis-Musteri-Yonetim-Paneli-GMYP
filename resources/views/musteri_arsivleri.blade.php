@extends('layouts.app')
@section('title', 'Musteri Arsiv Sayfasi')

@section('content')



    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" align='center'>
                    <div class="row justify-content-center">
                        <div class="jumbotron">
                            <h1 align="center" style="font-family: Arial Black; font-size:xx-large">Musteri Arşivleri</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="font-family: Arial; font-size:large">


                    <div class="col-md-2"></div>

                    <div class="col-md-8">
                       
                        <div class="row justify-content-center">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-active">
                                        <th scope="col" style="font-size: 16px;">#</th>
                                        <th scope="col" style="font-size: 16px;">User_Id</th>
                                        <th scope="col" style="font-size: 16px;">User_Name</th>
                                        <th scope="col" style="font-size: 16px;">User_Email</th>
                                        <th scope="col" style="font-size: 16px;">Customer_Id</th>
                                        <th scope="col" style="font-size: 16px;">Customer_Name</th>
                                        <th scope="col" style="font-size: 16px;">Customer_Lastname</th>
                                        <th scope="col" style="font-size: 16px;">Customer_Email</th>
                                        <th scope="col" style="font-size: 16px;">Customer_Telephone</th>
                                        <th scope="col" style="font-size: 16px;">Customer_About</th>
                                        <th scope="col" style="font-size: 16px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archives as $archive)
                                        <tr class="text-center">
                                            <th scope="row" style="font-size: 16px;">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td style="font-size: 16px;">{{ $archive->user_id }}</td>
                                            <td style="font-size: 16px;">{{ $archive->user_name }}</td>
                                            <td style="font-size: 16px;">{{ $archive->user_email }}</td>
                                            <td style="font-size: 16px;">{{ $archive->customer_id }}</td>
                                            <td style="font-size: 16px;">{{ $archive->customer_name }}</td>
                                            <td style="font-size: 16px;">{{ $archive->customer_lastname }}</td>
                                            <td style="font-size: 16px;">{{ $archive->customer_email }}</td>
                                            <td style="font-size: 16px;">{{ $archive->customer_telephone }}</td>
                                            <td style="font-size: 16px;">{{ $archive->customer_about }}</td>
                                            <td style="font-size: 16px;">{{ $archive->action }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
