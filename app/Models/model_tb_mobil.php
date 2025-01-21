<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class model_tb_mobil extends Model
{
    use HasUuids;
    use HasFactory;

    public $incrementing = false; // Non-incremental ID
    protected $keyType = 'string'; // ID berupa string

    protected $table='mobil';

    // protected $fillable = [
    //     'id',
    //     'gambar_direc',
    // ];

    protected $fillable = ['merek', 'kapasitas', 'plat','status', 'price_per_day', 'gambar_direc', 'model'];


}
