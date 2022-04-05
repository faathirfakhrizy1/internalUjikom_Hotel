@extends('layouts.foradmin')

@section('content')
    <section class="content">

        <div class="card text-center">
            <div class="card-header">
                Edit Kamar
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="{{ url('/update/kamar/' .$kamar->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col-md-4">
                        <label for="validationServer01" class="form-label">Tipe Kamar</label>
                        <select class="form-control" name="id_tipe" id="id_tipe">
                            <option value="" ></option>
                            @foreach ($tipe as $item)
                                <option value="{{ $item->nama }}" {{ $kamar->id_tipe == $item->nama ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-4">
                        <label for="" class="form-label">No Kamar</label>
                        <input type="number" class="form-control" name="nomor" value="{{ $kamar->nomor }}" id="" required>
                    </div>

                    {{-- <div class="col-md-4">
                        <label for="" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="{{ $kamar->harga }}" id="" required>
                    </div> --}}

                    <div class="col-md-4">
                        <label for="" class="form-label">Kapasitas</label>
                        <input type="number" class="form-control" name="kapasitas" value="{{ $kamar->kapasitas }}" id="" required>
                    </div>

                    {{-- <div class="col-md-6">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="" required>
                    </div> --}}


                    <div class="col-md-12">
                        @foreach ($fasilitas as $item)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="id_fasilitas[]" class="form-check-input"
                                value="{{ $item->nama }}" {{ in_array($item->nama, $id_fasilitas) ? 'checked' : '' }}>
                            <label class="form-check-label" for="">{{ $item->nama }}</label>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a class="btn btn-secondary" type="button" href="{{ route('list.kamar') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
