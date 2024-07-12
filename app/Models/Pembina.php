<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;

    protected $table = 'pembina';
    
    protected $fillable = [
        'nama',
        'gender',
        'tgl_lahir',
        'tmp_lahir',
        'keahlian',
        'quote',
        'rating',
        'image',
    ];
}
