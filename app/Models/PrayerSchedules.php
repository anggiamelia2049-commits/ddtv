<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrayerSchedules extends Model
{
    protected $table = 'prayerschedules';
    protected $primaryKey = 'id';

    protected $fillable = [
        'date',
        'subuh',
        'dhuha',
        'dzuhur',
        'ashar',
        'maghrib',
        'isya',
        'dzikirtadarus',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
