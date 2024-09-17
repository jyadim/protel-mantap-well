<?php

namespace App\Http\Controllers;

use App\Models\DetailProducts;
use App\Models\HomeProduct;
use App\Models\Products;
use App\Models\Project;
use Demo\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $product = Products::latest()->get();
        $ref = Project::latest()->get();
        return view('AdminProduct', compact('product', 'ref'));

    }
    public function productstore(Request $request)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000', // Add description validation
            'image_path' => 'nullable|image',
        ]);
        Log::info('Validation successful', ['validated' => $validated]);

        $product = new Products();

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $file_name = time().'_'.$file->getClientOriginalName();
            $filePath = 'image/product/' . $file_name;

            // Save the new image file
            Storage::disk('public')->put($filePath, file_get_contents($file));
            Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);

            // Delete the old image if it exists
            if (!is_null($product->image_path)) {
                Storage::disk('public')->delete('image/product/' . $product->image_path);
                Log::info('Old image deleted', ['old_image' => $product->image_path]);
            }

            // Update the image path
            $product->image_path = $file_name;
        }

        // Update product fields
        $product->name = $validated['name'];
        $product->description = $validated['description']; // Store description
        $product->slug = Str::slug($validated['name']);
        $product->user_id = Auth::id(); // Automatically set the current user
        Log::info('Product fields set', ['product' => $product]);

        // Save the product
        $product->save();
        Log::info('Product saved', ['product' => $product]);

        // Add product to homepage with user info
        $homeProduct = new HomeProduct();
        $homeProduct->product_id = $product->id; // Link the product
        $homeProduct->user_id = Auth::id(); // Set the user who added the product
        $homeProduct->title = $product->name; // Set the title
        $homeProduct->image_path = $product->image_path; // Set the image
        $homeProduct->save();
        Log::info('Product added to homepage', ['home_product' => $homeProduct]);

        // Redirect to product details form
        Session::flash('success', 'Product created successfully.');
        return redirect()->route('admin.product.details', ['product' => $product->id]);
    } catch (\Exception $e) {
        Log::error('Error creating product: ' . $e->getMessage());
        return redirect()->route('admin.dashboard')->with('error', 'An error occurred while creating the product. ' . $e->getMessage());
    }
}

    
    public function productupdate(Request $request, $slug)
    {
        DB::beginTransaction();
    
        try {
            Log::info('Update request received', ['slug' => $slug]);
    
            // Find the HomeProduct instance
            $product = Products::where('slug', $slug)->firstOrFail();
            Log::info('Product found', ['product' => $product]);
    
            // Validate request data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'desc' => 'required|string',
                'image_path' => 'nullable|image|mimes:jpg,jpeg,png', // Max size validation
            ]);
            Log::info('Validation successful', ['validated' => $validated]);
    
            // Prepare slug changes
            $oldSlug = $product->slug;
            $newSlug = Str::slug($validated['title']);
    
            // Handle image upload
            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                if ($file->isValid()) {
                    $fileName = time().'_'.$file->getClientOriginalName();
                    $filePath = 'image/product/' . $fileName;
                    Storage::disk('public')->put($filePath, file_get_contents($file));
                    Log::info('File uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);
    
                    // Delete the old image if it exists
                    if ($product->image_path && Storage::disk('public')->exists('image/product/' . $product->image_path)) {
                        Storage::disk('public')->delete('image/product/' . $product->image_path);
                        Log::info('Old image deleted', ['old_image' => $product->image_path]);
                    }
                    $product->image_path = $fileName;
                } else {
                    Log::error('Invalid image upload.');
                }
            }
    
            // Update the HomeProduct's fields
            $product->title = $validated['title'];
            $product->desc = $validated['desc'];
    
            // Update slug if title changed
            if ($newSlug !== $oldSlug) {
                $product->slug = $newSlug;
                DetailProducts::where('slug', $oldSlug)->update(['slug' => $newSlug]);
                Log::info('DetailProducts updated', ['old_slug' => $oldSlug, 'new_slug' => $newSlug]);
            }
    
            // Save the HomeProduct
            $product->save();
            Log::info('Product updated', ['product' => $product]);
    
            DB::commit();
            Session::flash('success', 'Product updated successfully.');
            Log::info('Product updated successfully.');
    
            return redirect()->route('product.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating product: ' . $e->getMessage());
            Session::flash('error', 'An error occurred while updating the product. ' . $e->getMessage());
            return redirect()->route('product.index');
        }
    }
    
      
      
      public function prddestroy($slug)
      {
        $product = Products::where('slug', $slug)->firstOrFail();
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
      }
}
