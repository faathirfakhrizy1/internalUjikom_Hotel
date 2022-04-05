<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuitansi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h3 class="text fw-bold">HOTEL <strong>HEBAT</strong></h3>
                <h6 class="float-right">Kuitansi Pembayaran</h6>
                <hr>
                    <div class="row">
                        <h6 class="card-subtitle mb-2 col-6">ID Transaksi</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->id }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Nama Klien</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->user->name }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Nomor Kamar</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->kamar->no_kamar }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Check In</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->check_in }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Check Out</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->check_out }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Total Kamar</h6>
                        <h6 class="card-subtitle mb-2 col-6">: {{ $data->jumlah_kamar }}</h6>
                        <h6 class="card-subtitle mb-2 col-6">Harga/Kamar</h6>
                        <h6 class="card-subtitle mb-2 col-6">: @currency($data->kamar->tipe->harga)</h6>
                        <hr>
                        <h6 class="card-subtitle mb-2 col-6">Total Harga</h6>
                        <h6 class="card-subtitle mb-2 col-6">: @currency($data->pay->harga)</h6>
                        <center>
                            <h6 class="card-subtitle mt-4 mb-2 col-12">Terima Kasih telah berkunjung </h6>
                        </center>
                        <a href="{{ route('customer.pdf', $data->id) }}" class="btn btn-sm btn-secondary">Download</a>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
