<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daerah extends Model
{
    protected $table = "daerahs";

    protected $fillable = [
        'logo_daerah',
        'daerah',
        'nama_daerah',
        'eskripsi',
    ];
}
