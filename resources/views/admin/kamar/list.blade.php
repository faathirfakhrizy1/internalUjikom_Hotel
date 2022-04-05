@extends('layouts.foradmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Kamar') }}
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="example1">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Tipe Kamar</th>
                                    <th>No kamar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dt->tipe_kamar }}</td>
                                        <td>{{ $dt->no_kamar }}</td>
                                        <td>{{ $dt->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a>
                                                <form action="#" method="POST">
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
                        <a href="{{ route('home') }}" class="btn btn-secondary mt-2" type="button">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
