<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembeli extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table        = 'pembeli';
    protected $primaryKey   = 'id_pembeli';
    protected $guarded      = [];
}
