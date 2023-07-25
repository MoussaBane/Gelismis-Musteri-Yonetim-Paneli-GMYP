<div class="row justify-content-center">
    <table class="table table-hover">
        <thead>
            <tr class="table-active">
                <th scope="col" style="font-size: 16px;">#</th>
                <th scope="col" style="font-size: 16px;">Name</th>
                <th scope="col" style="font-size: 16px;">LastName</th>
                <th scope="col" style="font-size: 16px;">Email</th>
                <th scope="col" style="font-size: 16px;">Tel</th>
                <th scope="col" style="font-size: 16px;">About</th>
                <th scope="col" style="font-size: 16px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <th scope="row" style="font-size: 16px;">{{ $loop->iteration }}</th>
                    <td style="font-size: 16px;">{{ $customer->name }}</td>
                    <td style="font-size: 16px;">{{ $customer->lastname }}</td>
                    <td style="font-size: 16px;">{{ $customer->email }}</td>
                    <td style="font-size: 16px;">{{ $customer->tel }}</td>
                    <td style="font-size: 16px;">{{ $customer->about }}</td>
                    <td>
                        <a href="{{ Route('musteri.update', ['id' => $customer->id]) }}"
                            class="btn btn-primary col-md-6">
                            <h4><b>DUZENLE</b></h4>
                        </a>

                        <a href="{{ Route('musteri.delete', ['id' => $customer->id]) }}"
                            class="btn btn-danger col-md-6" onclick="return confirmCustomerDelete();">
                            <h4><b>SIL</b></h4>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>