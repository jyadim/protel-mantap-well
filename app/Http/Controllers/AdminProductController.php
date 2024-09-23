<?php

namespace App\Http\Controllers;

use App\Models\DescriptionPoints;
use App\Models\DetailProducts;
use App\Models\HomeProduct;
use App\Models\ProductGallery;
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
                'description' => 'required|string|max:1000',
                'image_path' => 'nullable|image|mimes:jpg,jpeg,png',
            ]);
            Log::info('Validation successful', ['validated' => $validated]);
    
            $product = new Products();
    
            // Handle image upload
            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $filePath = 'image/product/' . $file_name;
    
                // Save the new image file
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
    
                // Delete old image if it exists
                if (!is_null($product->image_path)) {
                    Storage::disk('public')->delete('image/product/' . $product->image_path);
                    Log::info('Old image deleted', ['old_image' => $product->image_path]);
                }
    
                // Update image path
                $product->image_path = $file_name;
            }
    
            // Update product fields
            $product->title = $validated['name'];
            $product->desc = $validated['description'];
            $product->slug = Str::slug($validated['name']);
            $product->home_slug = $product->slug;
            Log::info('Product fields set', ['product' => $product]);
    
            // Save product
            $product->save();
            Log::info('Product saved', ['product' => $product]);
    
            // Add product to homepage
            $homeProduct = new HomeProduct();
            $homeProduct->user_id = Auth::id();
            $homeProduct->name = $product->title;
            $homeProduct->slug = $product->slug; // use the product slug instead of name
            $homeProduct->image_name = $product->title; // could be title or something more appropriate
            $homeProduct->image_path = $product->image_path;
            Log::info('Product added to homepage', ['home_product' => $homeProduct]);

            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $filePath = 'image/home_image/' . $file_name;
    
                // Save the new image file
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
    
                // Delete old image if it exists
                if (!is_null($product->image_path)) {
                    Storage::disk('public')->delete('image/home_image/' . $product->image_path);
                    Log::info('Old image deleted', ['old_image' => $product->image_path]);
                }
    
                // Update image path
                $homeProduct->image_path = $file_name;
            }
            $homeProduct->save();

            $detailProduct = new DetailProducts();
            $detailProduct->title = $product->title;
            $detailProduct->slug = $product->slug;
            $detailProduct->home_slug = $product->home_slug;
            $detailProduct->save();
            // Redirect to product details form
            Session::flash('success', 'Product created successfully.');
            return redirect()->route('detailproduct.createindex', ['slug' => $detailProduct->slug]);
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return redirect()->route('product.index')->with('error', 'An error occurred while creating the product. ' . $e->getMessage());
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
        Log::info('Attempting to delete product with slug', ['slug' => $slug]);
    
        // Check if the product exists in Products table
        $product = Products::where('slug', $slug)->first();
        if (!$product) {
            Log::error('Product not found', ['slug' => $slug]);
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Proceed with deletion
        try {
            // Delete the product from Products table
            $product->delete();
            Log::info('Product deleted successfully', ['slug' => $slug]);
    
            // Check and delete related DetailProducts
            $detailProduct = DetailProducts::where('slug', $slug)->first();
            if ($detailProduct) {
                Log::info('DetailProduct found for deletion', ['detail_product' => $detailProduct]);
    
                // Delete related images
                $productGalleries = ProductGallery::where('products_id', $detailProduct->id)->get();
                foreach ($productGalleries as $gallery) {
                    if ($gallery->image_path) {
                        Storage::disk('public')->delete($gallery->image_path);
                        Log::info('Product gallery image deleted', ['image_path' => $gallery->image_path]);
                    }
                    $gallery->delete();
                }
    
                // Delete related description points
                DescriptionPoints::where('products_id', $detailProduct->id)->delete();
                Log::info('Description points deleted', ['products_id' => $detailProduct->id]);
    
                // Delete the detail product itself
                $detailProduct->delete();
                Log::info('DetailProduct deleted successfully', ['slug' => $slug]);
            } else {
                Log::warning('DetailProduct not found for deletion', ['slug' => $slug]);
            }
    
            // Check and delete related HomeProducts
            $homeProduct = HomeProduct::where('slug', $slug)->first();
            if ($homeProduct) {
                Log::info('HomeProduct found for deletion', ['home_product' => $homeProduct]);
    
                if ($homeProduct->image_path) {
                    Storage::disk('public')->delete($homeProduct->image_path);
                    Log::info('Home product image deleted', ['image_path' => $homeProduct->image_path]);
                }
                $homeProduct->delete();
                Log::info('HomeProduct deleted successfully', ['slug' => $slug]);
            } else {
                Log::warning('HomeProduct not found for deletion', ['slug' => $slug]);
            }
    
            return redirect()->back()->with('success', 'Product and related records deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the product.');
        }
    }
    
    
    
    
    
}