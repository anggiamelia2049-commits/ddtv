<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrayerSchedules;
use App\Models\Categories;

class PrayerSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prayerschedules = PrayerSchedules::all();
        return view('prayerschedules.index', compact('prayerschedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prayerschedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'     => 'required|date',
            'subuh'    => 'required',
            'dhuha'    => 'required',
            'dzuhur'   => 'required',
            'ashar'    => 'required',
            'maghrib'  => 'required',
            'isya'     => 'required',
            'dzikirtadarus'   => 'nullable',
            'status' => 'required|in:active,inactive',
        ]);

        PrayerSchedules::create([
            'date'     => $request->date,
            'subuh'    => $request->subuh,
            'dhuha'    => $request->dhuha,
            'dzuhur'   => $request->dzuhur,
            'ashar'    => $request->ashar,
            'maghrib'  => $request->maghrib,
            'isya'     => $request->isya,
            'dzikirtadarus'   => $request->dzikirtadarus,
            'status' => $request->status
        ]);

        return redirect()->route('prayerschedules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataeditprayerschedules = PrayerSchedules::find($id);
        return view('prayerschedules.edit', compact('dataeditprayerschedules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date'     => 'required|date',
            'subuh'    => 'required',
            'dhuha'    => 'required',
            'dzuhur'   => 'required',
            'ashar'    => 'required',
            'maghrib'  => 'required',
            'isya'     => 'required',
            'dzikirtadarus'   => 'nullable',
            'status' => 'required|in:active,inactive',
        ]);

        $updatedata = PrayerSchedules::findOrFail($id);

        $updatedata->update([
            'date'     => $request->date,
            'subuh'    => $request->subuh,
            'dhuha'    => $request->dhuha,
            'dzuhur'   => $request->dzuhur,
            'ashar'    => $request->ashar,
            'maghrib'  => $request->maghrib,
            'isya'     => $request->isya,
            'dzikirtadarus'   => $request->dzikirtadarus,
            'status' => $request->status,
        ]);

        return redirect()->route('prayerschedules.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PrayerSchedules::findOrFail($id)->delete();
        return redirect()->route('prayerschedules.index');
    }
}
