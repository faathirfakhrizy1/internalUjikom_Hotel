<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
        if(!Auth::check() OR auth()->user()->role == "customer"){
            $type = TipeKamar::all();
            return view('landingpage', compact('type'));
        }elseif(auth()->user()->role == "admin"){
            return redirect()->route('home');
        }elseif(auth()->user()->role == "receptionis"){
            return redirect()->route('home');
        }
    }

    public function detail($id)
    {
        if(!Auth::check() OR auth()->user()->role == "customer"){
            $detail = Kamar::where('tipe_kamar','=', $id)->first();
            $jumlahPesanan = Kamar::where('tipe_kamar','=', $id,'AND')->where('status','=','a')->count();
            return view('guest.detail-kamar',compact('detail','jumlahPesanan','id'));
        }elseif(auth()->user()->role == "admin"){
            return redirect()->route('home');
        }elseif(auth()->user()->role == "receptionis"){
            return redirect()->route('home');
        }
    }
}
