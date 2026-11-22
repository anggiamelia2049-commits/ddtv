<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flyers;
use App\Models\Categories;

class FlyersController extends Controller
{
    public function index()
    {
        $flyers = Flyers::all();
        return view('flyers.index', compact('flyers'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('flyers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image',
            'status' => 'required|in:active,inactive',
        ]);

        $image = $request->file('image')->store('flyers', 'public');

        Flyers::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $image,
            'status' => $request->status,
        ]);

        return redirect()->route('flyers.index');
    }

    public function edit(string $id)
    {
        $dataeditflyers = Flyers::findOrFail($id);
        $categories = Categories::all();
        return view('flyers.edit', compact('dataeditflyers', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
            'status' => 'required|in:active,inactive',
        ]);

        $flyers = Flyers::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('flyers', 'public');
            $flyers->image = $image;
        }

        $flyers->title = $request->title;
        $flyers->category_id = $request->category_id;
        $flyers->status = $request->status;
        $flyers->save();

        return redirect()->route('flyers.index');
    }

    public function destroy(string $id)
    {
        Flyers::findOrFail($id)->delete();
        return redirect()->route('flyers.index');
    }
}
