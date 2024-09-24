<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Gallery;
use App\Models\PostType;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['abouts'] = Content::whereHas('postType', function($query) {
            $query->where('slug', 'about-us');
        })->get();

        return view('about.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $data['posttype'] = PostType::where('name', 'About us')->get();
         $data['galleries'] = Gallery::all();
         return view('about.create', $data);
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

        $originalSlug = $slug;
        $count = 1;

        while (PostType::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count; 
            $count++;
        }

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

        return redirect()->route('about.index')->with('success', 'About us created successfully');
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
        $data['posttype'] = PostType::where('name', 'About us')->get();
        $data['galleries'] = Gallery::all();
        $data['about'] = Content::where('slug', $slug)->firstOrFail();
        return view('about.edit', $data);
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
 
         // Handle the feature image update only if a new file is uploaded
         if ($request->hasFile('feature_image')) {

             // Get the new image file
             $image = $request->file('feature_image');
             $image_name = time() . '.' . $image->getClientOriginalExtension();
 
             // Move the new image to the public path
             $image->move(public_path('images'), $image_name);
 
             // Optionally delete the old image file if it exists
             if ($content->feature_image && file_exists(public_path('images/' . $content->feature_image))) {
                 unlink(public_path('images' . $content->feature_image));
             }
 
             // Update the feature_image field with the new image name
             $content->feature_image = $image_name;
             
         } else {
             // Retain the current image if no new image is uploaded (use hidden field)
             $content->feature_image = $request->input('current_image');
         }
 
         // Save the updated content
         $content->save();
 
         return redirect()->route('about.index')->with('success', 'About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $content = Content::where('slug', $slug)->first();

        if ($content) {
            $content->delete();
            return redirect()->route('about.index')->with('success','Content deleted successfully.');
        }

        return redirect()->route('about.index')->with('error' , 'Content not found.');
    }
}
