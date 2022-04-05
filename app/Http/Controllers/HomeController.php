<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function guest()
    {
        if(Auth::guest())
        {
            return view('auth.login');
        }
        else{
            return view('customer.booking');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return view('admin.home');
        }elseif(Auth::user()->role == 'customer')
        {
            return view('landingpage');
        }elseif(Auth::user()->role == 'resepsionis')
        {
            return view('receptionis.home');
        }
        return view('home');
    }
}
