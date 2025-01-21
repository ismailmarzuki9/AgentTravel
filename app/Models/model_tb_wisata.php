<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_tb_wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';

    protected $fillable = [
        'id', // Tambahkan jika Anda mengatur UUID manual
        'nama_wisata',
        'reting',
        'deskripsi',
        'lokasi',
        'harga_tiket',
        'gambar',
    ];

    // pastikan bahwa kolom id diatur sebagai string jika tidak id yang di get tidak susuai dengan DB.
    protected $casts = [
        'id' => 'string',
    ];
}
