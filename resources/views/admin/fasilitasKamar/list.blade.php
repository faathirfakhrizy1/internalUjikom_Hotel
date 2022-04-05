@extends('layouts.foradmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Fasilitas Kamar') }}
                    </div>

                    <div class="card-body">
                        <a href="{{ route('fasilitasKamar.create') }}" class="btn btn-primary mb-3" type="button">Buat Fasilitas
                            Kamar</a>
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('fasilitasKamar.edit', $row->id) }}" class="btn btn-sm btn-secondary"><i class="fas fa-pen"></i></a>
                                                <form action="{{ route('fasilitasKamar.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
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
