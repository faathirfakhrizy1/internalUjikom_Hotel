<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\LogActivities;
use App\Models\Payment;
use App\Models\Tipekamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResepsionisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('receptionis.home');
    }

    public function transaction()
    {
        $data = Transaksi::all();
        return view('receptionis.list', compact('data'));
    }

    public function logs()
    {
        $data = LogActivities::all();
        return view('receptionis.logs', compact('data'));
    }

    public function dibayar($id)
    {
        $data = Transaksi::find($id);
        $data->update(['status'=>'dibayar']);

        $log = date('YmdHis').'_customer_paid_order';
        LogActivities::create([
            'transaction_id'=>$data->id,
            'log'=>$log,
            'executor_id'=>Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function diverifikasi($id)
    {
        $data = Transaksi::find($id);
        $data->update(['status'=>'diverifikasi']);

        $log = date('YmdHis').'_customer_verify_order';
        LogActivities::create([
            'transaction_id'=>$data->id,
            'log'=>$log,
            'executor_id'=>Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function checkedIn($id)
    {
        $data = Transaksi::find($id);
        $data->update(['status'=>'checked_in']);

        $idKamar = explode(', ',$data->id_kamar);
        $dataKamar = Kamar::whereIn('id', $idKamar)->get();
        foreach ($dataKamar as $val) {
            Kamar::find($val->id)->update(['status' => 'o']);
        }

        $log = date('YmdHis').'_customer_checked_in';
        LogActivities::create([
            'transaction_id'=>$data->id,
            'log'=>$log,
            'executor_id'=>Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function checkedOut($id)
    {
        $transaction = Transaksi::find($id);
        $transaction->update(['status'=>'checked_out']);

        $idKamar = explode(', ',$transaction->id_kamar);
        $dataKamar = Kamar::whereIn('id', $idKamar)->get();
        foreach ($dataKamar as $val) {
            Kamar::find($val->id)->update(['status' => 'a']);
        }

        $log = date('YmdHis').'_customer_checked_out';
        LogActivities::create([
            'transaction_id'=>$transaction->id,
            'log'=>$log,
            'executor_id'=>Auth::user()->id,
        ]);
        return redirect()->back();
    }
}
