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
    {
        $data['programs'] = Content::whereHas('postType', function ($query) {
            $query->where('slug', 'program');
        })->get();

        return view('program.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['posttype'] = PostType::where('name', 'Program')->get();
        $data['galleries'] = Gallery::all();
        return view('program.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'sub_desc' => 'required',
            'galleries_id' => '',
            'post_types_id' => 'required',
            'feature_image' => 'required|mimes:jpg,jpeg,png,gif,bmp',
        ]);
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
    public function edit($slug)
    {
        $data['posttype'] = PostType::where('name', 'Program')->get();

        $data['galleries'] = Gallery::all();
        $data['program'] = Content::where('slug', $slug)->firstOrFail();
        return view('program.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $content = Content::where('slug', $slug)->firstOrFail();

        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'sub_desc' => 'required',
            'galleries_id' => '',
            'post_types_id' => 'required',
            'feature_image' => 'nullable|mimes:jpg,jpeg,png,gif,bmp',
        ]);

        // Update the content fields
        $content->title = $validatedData['title'];
        $content->description = $validatedData['description'];
        $content->sub_desc = $validatedData['sub_desc'];
        $content->galleries_id = $validatedData['galleries_id'];
        $content->post_types_id = $validatedData['post_types_id'];

        if ($request->hasFile('feature_image')) {
            // Get the new image file
            $image = $request->file('feature_image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $image_name);

            if ($content->feature_image && file_exists(public_path('images/program/' . $content->feature_image))) {
                unlink(public_path('images' . $content->feature_image));
            }

            $content->feature_image = $image_name;
        } else {
            $content->feature_image = $request->input('current_image');
        }

        $content->save();

        return redirect()->route('program.index')->with('success', 'Program updated successfully');
    }




    /**
     * Remove the specified resource from storage.
     */

    public function destroy($slug)
    {
        $content = Content::where('slug', $slug)->first();

        if ($content) {
            $content->delete();
            return redirect()->route('program.index')->with('success','Content deleted successfully.');
        }

        return redirect()->route('program.index')->with('error' , 'Content not found.');
    }


    public function createprogram(){
        dd('ssdds');
    }
}
