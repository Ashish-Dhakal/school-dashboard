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
        $data['galleries'] = Gallery::select('gallery_name')->paginate(4);
        return view('gallery.index',$data);
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
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
