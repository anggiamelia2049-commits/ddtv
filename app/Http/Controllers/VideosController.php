<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;
use App\Models\Categories;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Videos::all();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('videos.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title'       => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'video_file'  => 'required|mimes:mp4,mov,ogg,qt|max:50000', // Sesuai name di blade
        'status'      => 'required|in:active,inactive',
    ]);

    if ($request->hasFile('video_file')) {
        $path = $request->file('video_file')->store('videos/files', 'public');

        Videos::create([
            'title'       => $request->title,
            'category_id' => $request->category_id,
            'video_file'  => $path,
            'status'      => $request->status,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video saved!');
    }

    return back()->withInput();
}

    public function edit($id)
    {
        $dataeditvideos = Videos::findOrFail($id);
        $categories = Categories::all();
        return view('videos.edit', compact('dataeditvideos', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',

            'status'      => 'required|in:active,inactive',
        ]);

        $videos = Videos::findOrFail($id);

        $dataeditvideos = [
            'title'       => $request->title,
            'category_id' => $request->category_id,
            'status'      => $request->status,
        ];

        if ($request->hasFile('image')) {
        $dataeditvideos['image'] = $request->file('image')->store('videos/covers', 'public');
    }

    if ($request->hasFile('video_file')) {
        $dataeditvideos['video_file'] = $request->file('video_file')->store('videos/files', 'public');
    }

    $videos->update($dataeditvideos);
    return redirect()->route('videos.index');
    }

    public function destroy($id)
    {
        Videos::findOrFail($id)->delete();
        return redirect()->route('videos.index');
    }
}
