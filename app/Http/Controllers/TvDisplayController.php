<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use App\Models\Flyers;
use App\Models\PrayerSchedules;
use App\Models\RunningText;
use App\Models\Banners;
use Illuminate\Http\Request;
use Carbon\Carbon;

use function Symfony\Component\Clock\now;

class TvDisplayController extends Controller
{
    public function index()
    {
    //    $P = PrayerSchedules::where('date',Carbon::now()->format('Y-m-d'))->first();
        // dd($P);
   //dd(Flyers::where('status', 'active')->get());
        return view('tv.index', [
            'videos'  => Videos::where('status', 'active')->first(),
            'flyers'  => Flyers::where('status', 'active')->get(),
            'prayer'  => PrayerSchedules::where('date',Carbon::now()->format('Y-m-d'))->first(),
            'marquee' => RunningText::where('status', 'active')->first(),
            'Banner' => Banners::where('status', 'active')->first()
        ]);

    }
}
