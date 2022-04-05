<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Payment;
use App\Models\Tipekamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $print = [
            'title' => 'Welcome to Hotel Hebat.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('customer.print', $print);

        return $pdf->download('pembayaran.pdf');
    }

    public function print($id)
    {
        $data = Transaksi::find($id);
        $transaction = Payment::where('transaction_id','=',$data->id)->first();
        $totalHarga = $transaction->harga;

        $pdf = PDF::loadView('customer.print', ['data' => $data, 'transaction' => $transaction, 'totalHarga' => $totalHarga]);

        return $pdf->download('kuitansi.pdf');
    }

}
