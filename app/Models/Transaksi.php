<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'id_kamar',
        'check_in',
        'check_out',
        'jumlah_kamar',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar','id');
    }

    public function pay()
    {
        return $this->belongsTo(Payment::class, 'id', 'transaction_id');
    }
}
