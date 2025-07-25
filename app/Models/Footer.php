<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Daerah;

class Footer extends Model
{
    protected $fillable = [
        "daerah_id",
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }

}
