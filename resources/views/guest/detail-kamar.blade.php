@extends('layouts.guest')
@section('title','Detail Kamar')
@section('content')
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="row pt-4">
            <div class="col">
                <div class="card" style="width: 33rem;">
                    <img src="{{asset('images/' .$detail->tipe->foto)}}" class="d-block w-200 card-img-top" alt="...">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                      <h5 class="card-title">Detail Kamar</h5>
                      <hr>
                      <h6 class="card-subtitle mb-2"><strong>{{'Tipe Kamar : ' . ' ' . $detail->tipe->name}}</strong></h6>
                            <h6 class="card-subtitle mb-2"><strong>{{'Fasilitas Kamar : ' . ' ' . $detail->tipe->id_fasilitas}}</strong></h6>
                            <h6 class="card-subtitle mb-2"><strong>{{'kapasitas : ' . ' ' . 2}}</strong></h6>
                            <h6 class="card-subtitle mb-2"><strong>Harga : @currency($detail->tipe->harga)</strong></h6>
                            <h6 class="card-subtitle mb-2"><strong>{{'Kamar Tersedia : ' . ' ' . $jumlahPesanan}}</strong></h6>
                    </div>
                  </div>
            </div>
            {{-- <div class="col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset('images/' .$detail->tipe->foto)}}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col">
                {{-- <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            Detail Kamar
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2">{{'Tipe Kamar : ' . ' ' . $detail->tipe->name}}</h6>
                            <h6 class="card-subtitle mb-2">{{'Fasilitas Kamar : ' . ' ' . $detail->tipe->id_fasilitas}}</h6>
                            <h6 class="card-subtitle mb-2">{{'kapasitas : ' . ' ' . 2}}</h6>
                            <h6 class="card-subtitle mb-2">Harga : @currency($detail->tipe->harga)</h6>
                            <h6 class="card-subtitle mb-2">{{'Kamar Tersedia : ' . ' ' . $jumlahPesanan}}</h6>
                        </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            Form Booking
                        </div>
                        <div class="card-body">
                            @if (!Auth::check())
                                <center>
                                    <a href="{{ route('login') }}" class="btn theme_btn button_hover">Login</a>
                                </center>
                            @else
                                <form action="{{ route('customer.booking') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="tipe_kamar" value="{{ $id }}">
                                    <div class="form-group">
                                        <label for="">Total Kamar</label>
                                        <input type="number" class="form-control" {{ $jumlahPesanan == 0 ? 'disabled' : '' }} value="{{ $jumlahPesanan == 0 ? '0' : '1' }}" name="jumlah" min="1" max="{{ $jumlahPesanan }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="check_in">Check In</label>
                                            <input type="date" class="form-control" value="{{old('check_in')}}" onchange="checkout()" name="check_in" id="check_out" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="check_out">Check Out</label>
                                            <input type="date" class="form-control" value="{{old('check_out')}}" name="check_out" id="" required>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-warning float-right">Book</button>
                                </form>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('script')
<script>
    function checkout(){
        var checkin = new Date($('#check_in').val());
        // console.log(checkin);
        var dd = checkin.getDate()+1;
        var mm = checkin.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        var yyyy = checkin.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(dd=32){
            dd='01'
            mm+=1
        }
        if(mm<10){
            mm='0'+mm

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("check_out").setAttribute("min", today);
    }
}
</script>
@endsection
@endsection
