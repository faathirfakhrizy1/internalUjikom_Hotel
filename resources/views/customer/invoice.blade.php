@extends('layouts.guest')
@section('title','Invoice')
@section('content')
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section-heading">
                <h2 class="text-center">
                    Scan here!
                </h2>
            </div>
            <center>
            <img src="{{ asset('images/QRCode.png') }}" width="300px" height="300px" alt="">
            <div class="table-responsive">
                <table class="table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>@currency($totalHarga)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="{{ route('customer.list') }}" class="btn theme_btn button_hover">Back</a>
            </center>
        </div>
    </section>
@endsection
