<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Categories;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banners::all();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
         $categories = Categories::all();
         return view('banners.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image',
            'status' => 'required|in:active,inactive',
        ]);

        $image = $request->file('image')->store('banners', 'public');

        Banners::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'image' => $image,
            'status' => $request->status,
        ]);
        return redirect()->route('banners.index');

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
         $dataeditbanners = Banners::findOrFail($id);
         $categories = Categories::all();
         return view('banners.edit', compact('dataeditbanners', 'categories'));
    }

    public function update(Request $request, string $id)
    {
       $request->validate([

           'title' => 'required|string|max:255',
           'category_id' => 'required|exists:categories,id',
           'image' => 'nullable|image',
           'status' => 'required|in:active,inactive',
       ]);

       $banners = Banners::findOrFail($id);
       if ($request->hasFile('image')) {
        $image = $request->file('image')->store('banners', 'public');
        $banners->image = $image;
        }

        $banners->title = $request->title;
        $banners->category_id = $request->category_id;
        $banners->status = $request->status;
        $banners->save();

        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Banners::findOrFail($id)->delete();
         return redirect()->route('banners.index');
    }
}
