@extends('layouts.foradmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tipe Kamar') }}
                    <a href="{{ route('tipeKamar.create') }}" class="btn btn-primary mb-3" type="button">Buat Tipe Kamar</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                                <tr class="text-center">
                                    <td>No.</td>
                                    <td>Nama</td>
                                    <td>Fasilitas</td>
                                    <td>Info</td>
                                    <td>Harga</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dt->name }}</td>
                                        <td>{{ $dt->id_fasilitas }}</td>
                                        <td>{{ $dt->info }}</td>
                                        <td>@currency($dt->harga)</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a>
                                                <form action="{{ route('tipeKamar.destroy', $dt->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
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
