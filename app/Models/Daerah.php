<?php

namespace App\Models;

use App\Models\HeroSection;
use App\Models\AppSection;
use App\Models\Footer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Daerah extends Model
{
    protected $table = "daerahs";

    protected $fillable = [
        'logo_daerah',
        'daerah',
        'nama_daerah',
        'deskripsi',
    ];
    public function scopeWithinLastDays(Builder $query, int $days, string $tz = 'Asia/Makassar'): Builder
    {
        $end = Carbon::now($tz)->endOfDay();
        $start = Carbon::now($tz)->subDays($days - 1)->startOfDay();

        return $query->whereBetween('created_at', [
            $start->clone()->timezone('UTC'),
            $end->clone()->timezone('UTC'),
        ]);
    }

    public function scopeBetweenDates(Builder $query, string $startDate, string $endDate, string $tz = 'Asia/Makassar'): Builder
    {
        $start = Carbon::parse($startDate, $tz)->startOfDay();
        $end = Carbon::parse($endDate, $tz)->endOfDay();

        return $query->whereBetween('created_at', [
            $start->clone()->timezone('UTC'),
            $end->clone()->timezone('UTC'),
        ]);
    }

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
        return $this->hasMany(SosialMedia::class, 'daerah_id');
    }
    public function sosial_media()
    {
        return $this->hasMany(SosialMedia::class, 'daerah_id');
    }

    public function footer()
    {
        return $this->hasMany(Footer::class);
    }

}
