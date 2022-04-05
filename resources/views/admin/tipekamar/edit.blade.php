@extends('layouts.foradmin')

@section('content')
    <section class="content">

        <div class="card text-center">
            <div class="card-header">
                Edit Tipe Kamar
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="{{ url('/update/tipe/'.$tipe->id) }}" >
                    @csrf
                    @method('PATCH')
                    <div class="col-md-4">
                        <label for="validationServer01" class="form-label">nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $tipe->nama }}" id="validationServer01" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationServer01" class="form-label">stok</label>
                        <input type="number" class="form-control" name="stok" value="{{ $tipe->stok }}" id="validationServer01" required>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="{{ $tipe->harga }}" id="" required>
                    </div>
                    <div class="col-md-12">
                        <label for="validationServer02" class="form-label">Detail</label>
                        <input type="text" class="form-control" name="information" value="{{ $tipe->information }}" id="validationServer01" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a class="btn btn-secondary" type="button" href="{{ route('list.tipe') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
