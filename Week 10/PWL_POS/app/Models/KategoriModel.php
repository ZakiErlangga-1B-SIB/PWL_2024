<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';

    // public function users(): HasMany
    // {
    //     return $this->hasMany(BarangModel::class, 'level_id', 'level_id');
    // }
}
