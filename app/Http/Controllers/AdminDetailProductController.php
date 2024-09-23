<?php

namespace App\Http\Controllers;

use App\Models\DescriptionPoints;
use App\Models\DetailProducts;
use App\Models\PDF;
use App\Models\ProductGallery;
use App\Models\Products;
use App\Models\Project;
use App\Models\Reference;
use Database\Seeders\DetailGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminDetailProductController extends Controller
{
    public function edit($slug)
{
    // Fetch the detail product with related description points and product gallery
    $detailProduct = DetailProducts::where('slug', $slug)
        ->orWhere('home_slug', $slug)
        ->with(['descriptionPoints', 'productgallery'])
        ->firstOrFail();

    // Fetch latest products and projects
    $product = Products::latest()->get();
    $ref = Project::latest()->get();

    // Return the view with the data
    return view('AdminDetail', compact('detailProduct', 'product', 'ref'));
}
    public function createindex($slug)
{
    // Fetch the detail product with related description points and product gallery
    $detailProduct = DetailProducts::where('slug', $slug)
        ->orWhere('home_slug', $slug)
        ->with(['descriptionPoints', 'productgallery'])
        ->firstOrFail();

    // Fetch latest products and projects
    $product = Products::latest()->get();
    $ref = Project::latest()->get();

    // Return the view with the data
    return view('detailcreate', compact('detailProduct', 'product', 'ref'));
}
public function create(Request $request, $slug)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'titledesc' => 'nullable|array',
            'titledesc.*' => 'nullable|string|max:255',
            'video_upload' => 'nullable|mimes:mp4', // Validate video upload
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png', // Validate image uploads
            'descriptions' => 'nullable|array', // Validate that descriptions is an array
            'descriptions.*' => 'nullable|string|max:1000', // Validate each description point
        ]);

        Log::info('Validation successful', ['validated' => $validated]);

        // Create new product record
        $detailProduct = DetailProducts::where('slug', $slug)->firstOrFail();
       
        Log::info('Product saved', ['detailProduct' => $detailProduct]);

        // Handle video upload
        if ($request->hasFile('video_upload')) {
            $video = $request->file('video_upload');
            $videoName = time() . '_' . $video->getClientOriginalName();
            $videoPath = 'video/' . $videoName;
            Storage::disk('public')->put($videoPath, file_get_contents($video));
            $detailProduct->video_path = $videoName;
            $detailProduct->save();
            Log::info('Video uploaded', ['video_name' => $videoName, 'video_path' => $videoPath]);
        }

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = 'image/product/' . $imageName;
                Storage::disk('public')->put($imagePath, file_get_contents($image));

                // Save image paths to gallery
                $productGallery = new ProductGallery();
                $productGallery->products_id = $detailProduct->id;
                $productGallery->image_path = $imagePath;
                $productGallery->save();
                Log::info('Image uploaded', ['image_name' => $imageName, 'image_path' => $imagePath]);
            }
        }

        // Handle description points
        $titles = $request->input('titledesc', []);
        $descriptions = $request->input('descriptions', []);

        // Ensure the arrays are of equal length
        $pointsCount = max(count($titles), count($descriptions));

        for ($i = 0; $i < $pointsCount; $i++) {
            $title = $titles[$i] ?? null;
            $desc = $descriptions[$i] ?? null;

            if (!empty($title) || !empty($desc)) {
                $descriptionPoint = new DescriptionPoints();
                $descriptionPoint->products_id = $detailProduct->id;
                $descriptionPoint->title = $title;
                $descriptionPoint->desc = $desc;
                $descriptionPoint->save();
                Log::info('Description point saved', ['description_point' => $descriptionPoint]);
            }
        }

        // Redirect to details page or another route
        Session::flash('success', 'Product created successfully.');
        return redirect()->route('detailproduct.edit', ['slug' => $detailProduct->slug]);
    } catch (\Exception $e) {
        Log::error('Error creating product: ' . $e->getMessage());
        return redirect()->route('detailproduct.store')->with('error', 'An error occurred while creating the product. ' . $e->getMessage());
    }
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
            'descriptions.*' => 'nullable|string',
            'titledesc.*' => 'nullable|string',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png',
            'video_upload' => 'nullable|file|mimes:mp4,mov,ogg,qt0',
        ]);
        Log::info('Validation successful', ['validated' => $validated]);

        // Handle image upload for image1
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
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
                $fileName = time() . '_' . $file->getClientOriginalName();
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
                $fileName = time() . '_' . $file->getClientOriginalName();
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

        // Update the descriptions and titles
        $titles = $request->input('titledesc', []);
        $descriptions = $request->input('descriptions', []);
        
        // Ensure the arrays are of equal length
        $pointsCount = max(count($titles), count($descriptions));

        // Update or create description points
        $detailProduct->descriptionPoints()->each(function($desc, $index) use ($titles, $descriptions, $pointsCount) {
            $title = $titles[$index] ?? null;
            $descText = $descriptions[$index] ?? null;

            if (!empty($title) || !empty($descText)) {
                $desc->update(['title' => $title, 'desc' => $descText]);
            } else {
                // Optionally delete description points if not provided
                $desc->delete();
            }
        });

        // Add new description points if necessary
        for ($i = count($detailProduct->descriptionPoints); $i < $pointsCount; $i++) {
            $title = $titles[$i] ?? null;
            $descText = $descriptions[$i] ?? null;

            if (!empty($title) || !empty($descText)) {
                $descriptionPoint = new DescriptionPoints();
                $descriptionPoint->products_id = $detailProduct->id;
                $descriptionPoint->title = $title;
                $descriptionPoint->desc = $descText;
                $descriptionPoint->save();
            }
        }

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

// Store PDF
public function storePDF(Request $request, $slug) {
    $product = DetailProducts::where('slug', $slug)->firstOrFail();

    $request->validate([
        'pdf' => 'required|mimes:pdf',
        'title' => 'required|string|max:255',
    ]);

    // Simpan file dan ambil nama asli file
    $file = $request->file('pdf');
    $fileName = $file->getClientOriginalName(); // Nama asli file
    $path = $file->storeAs('pdfs', $fileName, 'public'); // Simpan file dengan nama asli dan ambil path

    // Simpan data ke dalam database
    PDF::create([
        'title' => $request->title,
        'file_path' => $fileName, // Path file
        'products_id' => $product->id,
    ]);

    return redirect()->back()->with('success', 'PDF uploaded successfully');
}

// Update PDF
public function updatePDF(Request $request, $slug, $id) {
    $product = DetailProducts::where('slug', $slug)->firstOrFail();
    $pdf = PDF::where('products_id', $product->id)->findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'pdf' => 'nullable|mimes:pdf',
    ]);

    // Update PDF file jika ada file baru
    if ($request->hasFile('pdf')) {
        // Validasi file
        $request->validate([
            'pdf' => 'mimes:pdf',
        ]);

        // Hapus file lama dari penyimpanan
        if ($pdf->file_path) {
            Storage::disk('public')->delete($pdf->file_path);
        }

        // Simpan file baru
        $file = $request->file('pdf');
        $fileName = $file->getClientOriginalName(); // Nama asli file
        $path = $file->storeAs('pdfs', $fileName, 'public'); // Simpan file dengan nama asli dan ambil path

        // Update path dan nama file di database
        $pdf->file_path = $fileName;
        // Simpan nama file jika diperlukan
    }

    // Update judul PDF
    $pdf->title = $request->title;
    $pdf->save();

    return redirect()->back()->with('success', 'PDF updated successfully');
}


    // Menghapus PDF
    public function destroyPDF($slug, $id) {
        $product = DetailProducts::where('slug', $slug)->firstOrFail();
        $pdf = PDF::where('products_id', $product->id)->findOrFail($id);

        Storage::disk('public')->delete($pdf->file_path);
        $pdf->delete();

        return redirect()->back()->with('success', 'PDF deleted successfully');
    }
}
