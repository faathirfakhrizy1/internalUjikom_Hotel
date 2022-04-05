@extends('layouts.guest')
@section('title','Payment')
@section('content')
<section class="accomodation_area section_gap">
<div class="section-heading">
    <h2 class="text-center">
        Transaksi Anda
    </h2>
</div>
<div class="container">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th>Username</th>
                    {{-- <th>Room number</th> --}}
                    <th>Tipe Kamar</th>
                    <th>Total Pesanan</th>
                    <th>Harga / Malam</th>
                    <th>Total Harga</th>
                    <th>Status Transaksi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $lt)
                    <tr class="text-center table-warning">
                        <td>{{ $lt->user->name }}</td>
                        {{-- <td>{{ $lt->kamar->no_kamar }}</td> --}}
                        <td>{{ $lt->kamar->tipe->name }}</td>
                        <td>{{ $lt->jumlah_kamar }}</td>
                        <td>@currency($lt->kamar->tipe->harga)</td>
                        <td>@currency($lt->pay->harga)</td>
                        <td>
                            @if ($lt->status == "menunggu")
                                {{-- <span class="badge badge-secondary"> --}}
                                    Menunggu Pembayaran
                                </span>
                            @elseif($lt->status == "dibayar")
                                {{-- <span class="badge badge-primary"> --}}
                                    Sudah Dibayar
                                </span>
                            @elseif($lt->status == "diverifikasi")
                                {{-- <span class="badge badge-success"> --}}
                                    Terverifikasi
                                </span>
                            @elseif($lt->status == "gagal")
                                {{-- <span class="badge badge-danger"> --}}
                                    Pembayaran Gagal
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($lt->status == "menunggu")
                                <div class="btn-group">
                                    <a href="{{ route('customer.cancel', $lt->id) }}" class="btn btn-sm btn-danger float-right">Cancel</a>
                                    <a href="{{ route('customer.pay', $lt->id) }}" class="btn btn-sm btn-primary float-right">Pay</a>
                                </div>
                            @elseif ($lt->status == "dibayar")
                                Paid
                            @elseif ($lt->status == "gagal")
                                Failed
                            @elseif($lt->status == "diverifikasi")
                                <a href="{{ route('customer.receipt', $lt->id) }}" class="btn btn-sm btn-secondary">Print Kuitansi</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('customer.invoice') }}" class="btn btn-warning  float-right">Pay all</a>
        <a href="{{ route('customer.home') }}" class="btn btn-secondary ">Back</a>
</div>
</section>
@endsection
