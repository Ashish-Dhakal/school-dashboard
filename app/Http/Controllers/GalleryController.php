<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // To log errors if needed
use Exception;

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
        // Validate the input
        $request->validate([
            'gallery_name' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,bmp|max:2048', // Validate each image
        ]);

        // Start a transaction
        DB::beginTransaction();

        try {
            // Create the gallery first
            $gallery = Gallery::create([
                'gallery_name' => $request->gallery_name,
            ]);

            // Check if images are uploaded
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // Store each image in the public directory
                    $imageName = time() . '_' . $image->getClientOriginalName();

                    // Move image to the public directory
                    $image->move(public_path('images/gallery'), $imageName);

                    // Ensure the image was successfully uploaded before storing in DB
                    if ($imageName) {
                        ImageGallery::create([
                            'galleries_id' => $gallery->id,
                            'image' => $imageName,  // Store the image name in the 'image' column
                        ]);
                    } else {
                        // If the image fails to upload, throw an error
                        throw new Exception('Image upload failed.');
                    }
                }
            }

            // Commit the transaction if everything works fine
            DB::commit();

            // Redirect with success message
            return redirect()->route('gallery.index')->with('success', 'Gallery and images uploaded successfully.');
        } catch (Exception $e) {
            // Rollback the transaction if any error occurs
            DB::rollBack();

            // Log the error for debugging
            Log::error('Gallery creation failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'Gallery creation failed. Please try again.']);
        }
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
