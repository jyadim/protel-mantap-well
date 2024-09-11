<?php

namespace App\Http\Controllers;

use App\Models\DetailProducts;
use App\Models\ProductGallery;
use App\Models\Products;
use App\Models\Project;
use Database\Seeders\DetailGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminDetailProductController extends Controller
{
    public function edit($slug)
    {
        $detailProduct = DetailProducts::where('slug', $slug)
    ->orWhere('home_slug', $slug)
    ->with(['descriptionPoints', 'productgallery'])
    ->firstOrFail();


$product = Products::latest()->get();
$ref = Project::latest()->get();

return view('AdminDetail', compact('detailProduct', 'product', 'ref'));

    }
    public function detailupdate(Request $request, $slug)
{
    DB::beginTransaction();

    try {
        Log::info('Update request received', ['slug' => $slug]);

        // Find the DetailProducts instance
        $detailProduct = DetailProducts::where('slug', $slug)->firstOrFail();
        Log::info('Product found', ['product' => $detailProduct]);

        // Validate request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'descriptions.*' => 'required|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png', // Max size validation
            'image2' => 'nullable|image|mimes:jpg,jpeg,png', // Max size validation
            'video_upload' => 'nullable|file|mimes:mp4,mov,ogg,qt0', // Max size validation
        ]);
        Log::info('Validation successful', ['validated' => $validated]);

        // Handle image upload for image1
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            if ($file->isValid()) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = 'image/product/' . $fileName;
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('Image1 uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);

                // Delete the old image if it exists
                if ($detailProduct->image1 && Storage::disk('public')->exists('image/product/' . $detailProduct->image1)) {
                    Storage::disk('public')->delete('image/product/' . $detailProduct->image1);
                    Log::info('Old image1 deleted', ['old_image' => $detailProduct->image1]);
                }
                $detailProduct->image1 = $fileName;
            } else {
                Log::error('Invalid image1 upload.');
            }
        }

        // Handle image upload for image2
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            if ($file->isValid()) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = 'image/product/' . $fileName;
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('Image2 uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);

                // Delete the old image if it exists
                if ($detailProduct->image2 && Storage::disk('public')->exists('image/product/' . $detailProduct->image2)) {
                    Storage::disk('public')->delete('image/product/' . $detailProduct->image2);
                    Log::info('Old image2 deleted', ['old_image' => $detailProduct->image2]);
                }
                $detailProduct->image2 = $fileName;
            } else {
                Log::error('Invalid image2 upload.');
            }
        }

        // Handle video upload
        if ($request->hasFile('video_upload')) {
            $file = $request->file('video_upload');
            if ($file->isValid()) {
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = 'video/' . $fileName;
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('Video uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);

                // Optionally, delete old video if necessary
                // if ($detailProduct->video && Storage::disk('public')->exists('video/' . $detailProduct->video)) {
                //     Storage::disk('public')->delete('video/' . $detailProduct->video);
                //     Log::info('Old video deleted', ['old_video' => $detailProduct->video]);
                // }
                $detailProduct->video = $fileName;
            } else {
                Log::error('Invalid video upload.');
            }
        }

        // Update the DetailProducts' fields
        $detailProduct->title = $validated['title'];

        // Update the descriptions
        $detailProduct->descriptionPoints()->each(function($desc, $index) use ($validated) {
            $desc->update(['desc' => $validated['descriptions'][$index]]);
        });

        // Save the DetailProducts
        $detailProduct->save();
        Log::info('Product updated', ['product' => $detailProduct]);

        DB::commit();
        Session::flash('success', 'Product updated successfully.');
        Log::info('Product updated successfully.');

return redirect()->route('detailproduct.edit', ['slug' => $detailProduct->slug]);
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error updating product: ' . $e->getMessage());
        Session::flash('error', 'An error occurred while updating the product. ' . $e->getMessage());
return redirect()->route('detailproduct.edit', ['slug' => $detailProduct->slug]);
    }
}
    // Store a new image
    public function store(Request $request, $products_id)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validation for multiple images
        ]);
        Log::info('Validation successful', ['validated' => $validated]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            $files = $request->file('images');

            foreach ($files as $file) {
                $file_name = time() . '_' . $file->getClientOriginalName();
                $filePath = 'image/product/' . $file_name;

                // Save the new image file
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);

                // Create a new ProductGallery entry for each image
                $image_gallery = new ProductGallery();
                $image_gallery->products_id = $products_id; // Set the product ID
                $image_gallery->image = $file_name; // Set the image file name
                $image_gallery->save();
                Log::info('Image_Gallery saved', ['image' => $image_gallery]);
            }
        }

        Session::flash('success', 'Images uploaded successfully.');

        // Redirect with the required slug
        return redirect()->route('detailproduct.edit', ['slug' => DetailProducts::findOrFail($products_id)->slug]);
    } catch (\Exception $e) {
        Log::error('Error creating image: ' . $e->getMessage());
        return redirect()->route('detailproduct.edit', ['slug' => DetailProducts::findOrFail($products_id)->slug])
                         ->with('error', 'An error occurred while creating the images. ' . $e->getMessage());
    }
}

    
public function update(Request $request, $id)
{
    DB::beginTransaction();

    try {
        Log::info($request->all());

        // Find the ProductGallery instance
        $image_gallery = ProductGallery::findOrFail($id);

        // Retrieve the associated DetailProducts instance
        $product = DetailProducts::findOrFail($image_gallery->products_id);

        // Validate image data
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Handle picture updates if available
        if ($request->hasFile('image')) {
            Log::info('Image found in request');

            $picture = $request->file('image');
            $filename = 'image' . Str::random(10) . '.' . $picture->getClientOriginalExtension();
            $filePath = 'image/product/' . $filename;

            // Save image to the storage
            Storage::disk('public')->put($filePath, file_get_contents($picture));
            Log::info('Image saved at: ' . $filePath);

            // Update the image field in the database
            $updated = $image_gallery->update(['image' => $filename]);
            Log::info('Image update status: ' . $updated);
        } else {
            Log::error('No image found in request');
        }

        DB::commit();
        Log::info('Transaction committed.');

        // Redirect to the product's edit page using the slug
        return redirect()->route('detailproduct.edit', ['slug' => $product->slug])
            ->with('success', 'Image updated successfully');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error updating image: ' . $e->getMessage());

        return redirect()->route('detailproduct.edit', ['slug' => $product->slug])
            ->with('error', 'An error occurred while updating the image: ' . $e->getMessage());
    }
}



    // Delete an image
    public function destroy($id)
    {
        $gallery = ProductGallery::findOrFail($id);

        // Delete image from storage
        Storage::disk('public')->delete('images/' . $gallery->image);

        $gallery->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

}
