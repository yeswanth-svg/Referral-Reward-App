<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    //
    public function index()
    {
        // Fetch existing images from the database
        $images = GalleryImage::all();
        return view('admin.gallery', compact('images'));
    }

    public function upload(Request $request)
    {
        // Validate that at least one image is selected
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each file
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/gallery'), $imageName);

                // Save image details in the database
                $galleryImage = new GalleryImage();
                $galleryImage->name = $imageName;
                $galleryImage->path = 'uploads/gallery/' . $imageName;
                $galleryImage->save();
            }

            return redirect()->back()->with('success', 'Images uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Upload failed');
    }


    // In GalleryController.php

    public function deleteImage($id)
    {
        \Log::info('Delete function called for image ID: ' . $id);

        // Find the image by ID
        $image = GalleryImage::find($id);

        if (!$image) {
            \Log::error('Image not found: ' . $id);
            return redirect()->back()->with('error', 'Image not found.');
        }

        // Delete the image record from the database
        $image->delete();
        \Log::info('Image record deleted successfully.');

        // Redirect back with success message
        return redirect()->back()->with('success', 'Image record deleted successfully.');
    }






}
