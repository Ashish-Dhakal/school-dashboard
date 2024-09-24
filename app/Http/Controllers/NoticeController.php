<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Gallery;
use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['notices'] = Content::whereHas('postType', function ($query) {
            $query->where('slug', 'notice');
        })->get();

        return view('notice.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retrive all the posttype name
        $data['posttype'] = PostType::where('name', 'Notice')->get();
        $data['galleries'] = Gallery::all();
        return view('notice.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'galleries_id' => '',
            'post_types_id' => 'required',
            'pdf' => 'required|mimes:jpg,jpeg,png,gif,bmp,pdf',
            'date' => 'required'
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
        $content->date = $validatedData['date'];
        $content->galleries_id = $validatedData['galleries_id'];
        $content->post_types_id = $validatedData['post_types_id'];
        $content->pdf = $validatedData['pdf'];

        if ($request->hasFile('pdf')) {
            $image = $request->file('pdf');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

            // Save only the image file name in the database
            $content->pdf = $image_name;
        }
        $content->save();

        return redirect()->route('notice.index')->with('success', 'Notice created successfully');
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
        $data['posttype'] = PostType::where('name', 'Notice')->get();

        $data['galleries'] = Gallery::all();
        $data['notice'] = Content::where('slug', $slug)->firstOrFail();
        return view('notice.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $slug)
    {
        // Find the content by its slug
        $content = Content::where('slug', $slug)->firstOrFail();

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'galleries_id' => '',
            'post_types_id' => 'required',
            'pdf' => 'nullable|mimes:pdf,jpg,jpeg,png,gif,bmp', // Removed file size limit
            'date' => 'nullable|date'
        ]);

        // Update the content fields
        $content->title = $validatedData['title'];
        $content->description = $validatedData['description'];
        $content->galleries_id = $validatedData['galleries_id'] ?? $content->galleries_id;
        $content->post_types_id = $validatedData['post_types_id'];
        $content->date = $validatedData['date'] ?? $content->date;

        // Handle the PDF update
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');

            if ($pdf->isValid()) {
                // Generate a new unique name for the file
                $pdf_name = time() . '.' . $pdf->getClientOriginalExtension();

                // Move the file to public/images
                $uploadSuccess = $pdf->move(public_path('images'), $pdf_name);

                // If move() fails, return an error
                if (!$uploadSuccess) {
                    return back()->withErrors(['pdf' => 'Failed to upload the PDF file.']);
                }

                // Optionally delete the old file if it exists
                if ($content->pdf && file_exists(public_path('images/' . $content->pdf))) {
                    unlink(public_path('images/' . $content->pdf));
                }

                // Update the content's PDF field
                $content->pdf = $pdf_name;
            } else {
                return back()->withErrors(['pdf' => 'Uploaded file is not valid.']);
            }
        }

        // Save the content
        try {
            $content->save();
            return redirect()->route('notice.index')->with('success', 'Notice updated successfully');
        } catch (\Exception $e) {
            \Log::error('Error saving notice:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to update notice: ' . $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */

    public function destroy($slug)
    {
        $content = Content::where('slug', $slug)->first();

        if ($content) {
            $content->delete();
            return redirect()->route('program.index')->with('success', 'Content deleted successfully.');
        }

        return redirect()->route('program.index')->with('error', 'Content not found.');
    }
}
