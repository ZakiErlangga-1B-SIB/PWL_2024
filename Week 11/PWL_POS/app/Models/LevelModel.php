<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';
    protected $primaryKey = 'level_id'; // kalau kamu pakai custom PK
    public $timestamps = true; // kalau tabel pakai created_at/updated_at

    protected $fillable = [
        'level_kode', 
        'level_nama',
    ];
}
