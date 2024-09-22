<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // select the only gallery_name only from gallery database
        $data['galleries'] = Gallery::paginate(4);
        return view('gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the input data and save to database
        $request->validate([
            'gallery_name' => 'required|max:30|min:5|unique:galleries,gallery_name'
        ]);
        // save teh gallery_name in databse in a individual way
        Gallery::create([
            'gallery_name' => $request->gallery_name
        ]);

        return redirect()->back()->with('success', 'Gallery created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);  // Ensure this is fetching the correct gallery record
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery, $id)
    {
        // validate the input data and save to database
        $request->validate([
            'gallery_name' => 'required|max:30|min:5|unique:galleries,gallery_name'
        ]);

        Gallery::where('id', $id)->update([
            'gallery_name' => $request->gallery_name
        ]);
        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery, $id)
    {
        // delete the gallery row havig  the $id
        Gallery::destroy($id);
        return redirect()->back()->with('success', 'Gallery deleted successfully!');
    }
}
