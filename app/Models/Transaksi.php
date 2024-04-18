<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table        = 'transaksi';
    protected $primaryKey   = 'id_transaksi';
    protected $guarded      = [];

    public function barang(): HasOne
    {
        return $this->hasOne(Barang::class, 'id_barang', 'id_barang');
    }

    public function pembeli(): HasOne
    {
        return $this->hasOne(Pembeli::class, 'id_pembeli', 'id_pembeli');
    }

    public function pembayaran(): HasOne
    {
        return $this->hasOne(Pembayaran::class, 'id_transaksi', 'id_transaksi');
    }
}
