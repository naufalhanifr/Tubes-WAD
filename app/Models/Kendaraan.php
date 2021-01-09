<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';
    protected $guarded = [];

    public function jenis()
    {
        return $this->hasOne(JenisKendaraan::class,'id','jenis_kendaraan_id');
    }
}
