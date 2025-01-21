<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_tb_kuliner extends Model
{
    use HasFactory;


    protected $table='kuliner'; //info untuk nama tabel di DB ini bisa di gunakan untuk menukar nama tabel dan model menjadi tidak sama
    // Tentukan atribut yang diizinkan untuk mass assignment
    protected $fillable = [
        'id', // Tambahkan jika Anda mengatur UUID manual
        'nama_kuliner',
        'reting',
        'deskripsi',
        'lokasi',
        'harga_rata',
        'gambar',
    ];

    // pastikan bahwa kolom id diatur sebagai string jika tidak id yang di get tidak susuai dengan DB.
    protected $casts = [
        'id' => 'string',
    ];
}
