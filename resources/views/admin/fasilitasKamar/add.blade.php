@extends('layouts.foradmin')

@section('content')
    <section class="content">

        <div class="card text-center">
            <div class="card-header">
                Tambah Fasilitas Kamar
            </div>
            <div class="card-body">
                <form class="row g-3" method="POST" action="{{ route('fasilitasKamar.store') }}" >
                    @csrf
                    <div class="col-md-12">
                        <label for="validationServer01" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" id="validationServer01" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Tambahkan</button>
                        <a class="btn btn-secondary" type="button" href="{{ route('home') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>



    </section>
@endsection
