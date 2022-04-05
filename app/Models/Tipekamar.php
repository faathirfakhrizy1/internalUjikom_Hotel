<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipekamar extends Model
{
    use HasFactory;

    protected $table = 'tipe_kamar';

    protected $fillable = [
        'name',
        'id_fasilitas',
        'info',
        'harga',
        'foto',
    ];

}
