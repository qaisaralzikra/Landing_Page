<?php

namespace App\Models;

use App\Models\Daerah;
use Illuminate\Database\Eloquent\Model;

class AppSection extends Model
{
    protected $table = "app_sections";

    protected $fillable = [
        'logo_app',
        'nama_app',
        'deskripsi',
        'daerah_id',
        'link',
        'versi'
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }
}
