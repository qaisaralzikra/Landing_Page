<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    protected $fillable = [
        'daerah_id',
        'media_sosial',
        'link_sosmed',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }
}
