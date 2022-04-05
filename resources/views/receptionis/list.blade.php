@extends('layouts.foradmin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                Data transaksi
            </h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>User</th>
                            <th>ID Kamar</th>
                            <th>Tgl Check in</th>
                            <th>Tgl Check out</th>
                            <th>Jumlah Kamar</th>
                            <th>Tanggal pemesanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->user->name }}</td>
                                <td>{{ $dt->id_kamar }}</td>
                                <td>{{ $dt->check_in }}</td>
                                <td>{{ $dt->check_out }}</td>
                                <td>{{ $dt->jumlah_kamar }}</td>
                                <td>{{ $dt->created_at }}</td>
                                <td>{{ $dt->status }}</td>
                                <td>
                                    @if ($dt->status == 'menunggu')
                                        <a href="{{ route('receptionis.dibayar', $dt->id) }}" class="btn btn-sm btn-primary">Bayar</a>
                                    @elseif ($dt->status == 'dibayar')
                                        <a href="{{ route('receptionis.diverifikasi', $dt->id) }}" class="btn btn-sm btn-success">Verifikasi</a>
                                    @elseif ($dt->status == 'diverifikasi')
                                        <a href="{{ route('receptionis.checkedIn', $dt->id) }}" class="btn btn-sm btn-info">Check in</a>
                                    @elseif ($dt->status == 'checked_in')
                                        <a href="{{ route('receptionis.checkedOut', $dt->id) }}" class="btn btn-sm btn-secondary">Check out</a>
                                    @else
                                        Transaksi Selesai!
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
