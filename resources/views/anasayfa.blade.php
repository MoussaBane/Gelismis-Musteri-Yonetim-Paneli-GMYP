@extends('layouts.app')
@section('title', 'Ana Sayfa')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron">
                <h1 align="center" style="font-family: Arial Black; font-size:xx-large">Gelismis Musteri Yonetim Paneli</h1>
            </div>
        </div>

        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>About Us</b></h1>
                    </div>

                    <div class="card-body">
                        <p class="fs-2">
                            <b>"MYP SUARESOFT"</b> adlı projemiz, gelişmiş müşteri paneli oluşturma amacı taşımaktadır. Bu
                            panel,
                            kullanıcılara müşterilerini yönetme imkanı sunmayı hedeflemektedir. Müşterilerinizi etkili bir
                            şekilde yönetebilmek, iş süreçlerinizi kolaylaştırarak zaman ve kaynak tasarrufu sağlamak için
                            önemlidir.
                        </p>
                        <p class="fs-2">
                            <b>"MYP SUARESOFT"</b> olarak, kullanıcı dostu arayüzümüz ve işlevsel özelliklerimizle
                            müşteri yönetimini kolaylaştırmayı amaçlıyoruz. Profesyonel bir müşteri yönetim deneyimi
                            sunarak, işletmenizin büyümesine katkıda bulunmayı hedefliyoruz.
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header" align='center'>
                        <h1><b>Examples</b></h1>
                    </div>

                    <div class="card-body">
                        @include('anasayfa_graphic')
                    </div>
                </div>

            </div>

        </div>
    </div>

    @include('footer')

@endsection
