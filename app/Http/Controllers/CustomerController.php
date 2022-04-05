<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Payment;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use App\Models\LogActivities;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;

class CustomerController extends Controller
{
    public function index()
    {
        $type = TipeKamar::all();
        return view('landingpage', compact('type'));
    }

    public function booking(Request $request)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }else{


        $type = TipeKamar::find($request->tipe_kamar);
        $check_in = Carbon::parse($request->check_in);
        $check_out = Carbon::parse($request->check_out);
        $totalMalam = $check_in->diffInDays($check_out);

        $jumlahPesanan = $request->jumlah;
        // dd($request->tipe_kamar);

        $kamar = Kamar::where('tipe_kamar','=',$request->tipe_kamar)->where('status','=','a')->get()->take($jumlahPesanan);

        foreach($kamar as $value){
            $kmr[] = $value->id;
            $nomorKamar[] = $value->no_kamar;
            Kamar::find($value->id)->update(['status' => 'b']);
        }

        // dd($kamar);
        if ($kamar != NULL){
            $idKamar = implode(', ', $kmr);
            $nomorKamar = implode(', ', $nomorKamar);
        }else{
            $idKamar = "ERROR!";
        }

        $totalHarga = $type->harga * $totalMalam * $jumlahPesanan;

        $transaction = Transaksi::create([
            'user_id' => Auth::user()->id,
            'id_kamar' => $idKamar,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'jumlah_kamar' => $jumlahPesanan,
        ]);
        // dd($transaction);
        Payment::create([
            'user_id' => Auth::user()->id,
            'transaction_id' => $transaction->id,
            'harga' => $totalHarga,
        ]);

        $log = date('YmdHis').'_customer_booking';
        LogActivities::create([
            'transaction_id' => $transaction->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('customer.bayar');
        // return view('customer.pay', compact('request'));
        }
    }

    public function bayar()
    {
        $transaction = Transaksi::where('user_id','=',Auth::user()->id, 'AND')->where('status','=','menunggu')->latest('created_at')->first();
        $bayar = Payment::where('transaction_id','=',$transaction->id)->first();
        $totalHarga = $bayar->harga;
        $jumlahPesanan = $transaction->jumlah_kamar;
        $idKamar = explode(', ', $transaction->id_kamar);

        $kamar = Kamar::whereIn('id', $idKamar)->get();
        // dd($kamar[0]->tipe_kamar);
        $data = TipeKamar::where('id','=', $kamar[0]->tipe_kamar)->first();
        foreach ($kamar as $kmr){
            $nomorKamar[] = $kmr->no_kamar;
        }
        $nomorKamar = implode(', ', $nomorKamar);

        return view('customer.pay', compact('nomorKamar','totalHarga','jumlahPesanan','data','bayar'));
    }

    public function invoice()
    {
        $transactionId = Transaksi::where('user_id','=', Auth::user()->id, 'AND')->where('status','=','menunggu')->pluck('id');
        $bayar = Payment::whereIn('transaction_id', $transactionId)->get();
        $totalHarga = 0;
        foreach($bayar as $value){
            $totalHarga += $value->harga;
        }
        return view('customer.invoice', compact('totalHarga'));
    }

    public function transactionList()
    {
        $list = Transaksi::where('user_id','=', Auth::user()->id)->get();
        return view('customer.list', compact('list'));
    }

    public function transactionPay($id)
    {
        $transaction = Transaksi::find($id);
        $pay = Payment::where('transaction_id','=',$transaction->id)->first();
        $totalHarga = $pay->harga;

        return view('customer.invoice', compact('totalHarga'));
    }

    public function transactionCancel($id)
    {
        $transaction = Transaksi::find($id);
        $transaction->update(['status'=>'gagal']);

        $idKamar = explode(', ',$transaction->id_kamar);
        $dataKamar = Kamar::whereIn('id', $idKamar)->get();
        foreach ($dataKamar as $val) {
            Kamar::find($val->id)->update(['status' => 'a']);
        }

        $log = date('YmdHis').'_customer_cancel_order';
        LogActivities::create([
            'transaction_id' => $transaction->id,
            'log' => $log,
            'executor_id' => Auth::user()->id,
        ]);

        return redirect()->route('customer.list');
    }

    public function receipt($id)
    {
        $data = Transaksi::find($id);
        $transaction = Payment::where('transaction_id','=',$data->id)->first();
        $totalHarga = $transaction->harga;

        // dd($transaction);
        return view('customer.receipt', compact('data','totalHarga'));
    }

    public function print($id)
    {
        $data = Transaksi::find($id);

        // $pdf = PDF::loadView('customer.print', ['data' => $this->$data]);
        $pdf = PDF::loadView('customer.print', compact('data'));

        return $pdf->download('kuitansi.pdf');
    }
}
