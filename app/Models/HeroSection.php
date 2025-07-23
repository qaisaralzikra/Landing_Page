<?php

namespace App\Models;

use App\Models\Daerah;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $table = "hero_sections";

    protected $fillable = [
        'bgimage',
        'title',
        'subtitle',
        'daerah_id',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }
}
