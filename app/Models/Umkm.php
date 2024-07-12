<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $fillable = [
        'nama',
        'pemilik',
        'email',
        'website',
        'provinsi_id',
        'kabkota_id',
        'kategori_umkm_id',
        'pembina_id',
        'rating',
        'image',
        'alamat',
        'modal',
        'harga',
        'deskripsi'
    ];
}
