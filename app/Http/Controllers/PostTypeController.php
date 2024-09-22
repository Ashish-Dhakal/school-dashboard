<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Url;

class PostTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->fetch_all_program();
        return view('post-type.index', $data);
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
        $validation = $request->validate([
            'name' => 'required|max:20|min:3'
        ]);

        // Create initial slug
        $slug = strtolower(str_replace(' ', '-', $validation['name']));

        // Check for uniqueness
        $originalSlug = $slug;
        $count = 1;

        while (PostType::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count; // Append a number to the slug
            $count++;
        }

        // Create the post type
        PostType::create([
            'name' => $validation['name'],
            'slug' => $slug,
        ]);
        return redirect()->route('postType.index')->with('success', 'Post type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostType $postType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(PostType $postType, $slug)
    {
        $data['postType'] = PostType::where('slug', $slug)->firstOrFail();
        return view('post-type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostType $postType, $slug)
    {
        $postType = PostType::where('slug', $slug)->firstOrFail();
        $validator =  Validator::make($request->all(), [
            'name' => 'required|max:15|min:3',
        ]);

        if ($validator->passes()) {

            $postType->name = $request->name;
            $postType->save();
            return redirect()->route('postType.index')->with('success', 'PostType Updated Successfully!');
        } else {
            return redirect()->route('postType.edit', $slug)->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostType $postType, $slug)
    {
        $postType = PostType::where('slug', $slug)->firstOrFail();
        $postType->delete();
        return redirect()->route('postType.index')->with('success', 'Post type deleted successfully');
    }
}
