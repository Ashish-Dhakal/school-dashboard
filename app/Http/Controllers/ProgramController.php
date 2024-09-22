<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Gallery;
use App\Models\PostType;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    $data['programs'] = Content::where('post_types_id', 1)->get();

        return view('program.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retrive all the posttype name
        $data['posttypes'] = PostType::all();
        $data['galleries'] = Gallery::all();
        return view('program.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'sub_desc' => 'required',
            'galleries_id' => 'required',
            'post_types_id' => 'required',
            'feature_image' => 'required|mimes:jpg,jpeg,png,gif,bmp',
        ]);
        // Create initial slug
        $slug = strtolower(str_replace(' ', '-', $validatedData['title']));

        // Check for uniqueness
        $originalSlug = $slug;
        $count = 1;

        while (PostType::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count; // Append a number to the slug
            $count++;
        }
        // save the data
        $content = new Content();
        $content->title = $validatedData['title'];
        $content->slug = $slug;
        $content->description = $validatedData['description'];
        $content->sub_desc = $validatedData['sub_desc'];
        $content->galleries_id = $validatedData['galleries_id'];
        $content->post_types_id = $validatedData['post_types_id'];
        $content->feature_image = $validatedData['feature_image'];
        
        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            
            // Save only the image file name in the database
            $content->feature_image = $image_name;
        }
        $content->save();
        
        return redirect()->route('program.index')->with('success', 'Program created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
