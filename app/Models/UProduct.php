<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama',
        'Harga',
        'Stok',
        'Berat',
        'Gambar',
        'Kondisi',
        'Deskripsi',

    ];
}
