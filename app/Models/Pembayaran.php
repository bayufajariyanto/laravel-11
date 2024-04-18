<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table        = 'pembayaran';
    protected $primaryKey   = 'id_pembayaran';
    protected $guarded      = [];
}
