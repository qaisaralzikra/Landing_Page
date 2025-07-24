<?php

namespace App\Models;

use App\Models\HeroSection;
use App\Models\AppSection;
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

    public function heroSections()
    {
        return $this->hasMany(HeroSection::class);
    }
    public function appSections()
    {
        return $this->hasMany(AppSection::class);
    }

    public function sosialMedia()
    {
        return $this->hasMany(SosialMedia::class);
    }
}
