<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori'; // Pastikan nama tabelnya benar
    protected $primaryKey = 'kategori_id'; // Kalau pakai custom primary key

    protected $fillable = [
        'kategori_kode',
        'kategori_nama',
    ];
}
