<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RunningText;
use App\Models\Categories;

class RunningTextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $runningtext = RunningText::with('category')->get();
        return view('runningtext.index', compact('runningtext'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('runningtext.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'text_content'   => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);
        RunningText::create([
            'category_id' => $request->category_id,
            'text_content' => $request->text_content,
            'status' => $request->status,
        ]);
        return redirect()->route('runningtext.index');
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
        $dataeditrunningtext = RunningText::findOrFail($id);
        $categories = Categories::all();
        return view('runningtext.edit', compact('dataeditrunningtext', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'text_content'   => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);
        $dataeditrunningtext = RunningText::findOrfail($id);
        $dataeditrunningtext->update([
            'category_id' => $request->category_id,
            'text_content' => $request->text_content,
            'status' => $request->status,
        ]);
        return redirect()->route('runningtext.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RunningText::findOrFail($id)->delete();
        return redirect()->route('runningtext.index');
    }
}
