<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = [];
    protected $dates = ['jam_masuk','jam_keluar'];

    public function spot()
    {
        return $this->belongsTo(Spot::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
