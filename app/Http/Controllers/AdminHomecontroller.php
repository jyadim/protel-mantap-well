<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\DetailProducts;
use App\Models\HomeProduct;
use App\Models\News;
use App\Models\Products;
use App\Models\Project;
use App\Models\QuickAccess;
use App\Models\Reference;
use App\Models\User;
use Demo\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AdminHomeController extends Controller
{
  public function index()
  {
    $banner = Banner::with('author')->latest()->get();
    $prodhome = HomeProduct::with('author')->latest()->get();
    $quickaccess = QuickAccess::with('author')->latest()->get();
    $news = News::with('author')->latest()->get();    
    $users = User::latest()->get(); // Fetch all users
    $product = Products::latest()->get(); 
    $ref = Project::latest()->get(); 

    return view('dashboardAdmin', compact('banner', 'prodhome', 'quickaccess', 'news', 'users', 'product', 'ref'));
  }
  

  public function bnnrupdate(Request $request, $id)
  {
      try {
          $banner = Banner::findOrFail($id);
          Log::info('Banner found', ['banner' => $banner]);
  
          $validated = $request->validate([
              'title' => 'required|string|max:255',
              'subtitle' => 'required|string|max:255',
              'image_path' => 'nullable|image',
          ]);
          Log::info('Validation successful', ['validated' => $validated]);
  
          $banner->title = $validated['title'];
          $banner->subtitle = $validated['subtitle'];
  
          if ($request->hasFile('image_path')) {
              $file = $request->file('image_path');
              $file_name = time().'_'.$file->getClientOriginalName();
              $filePath = 'image/home_image/' . $file_name;
  
              Storage::disk('public')->put($filePath, file_get_contents($file));
              Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
  
              if (!is_null($banner->image_path)) {
                  Storage::disk('public')->delete('image/home_image/' . $banner->image_path);
                  Log::info('Old image deleted', ['old_image' => $banner->image_path]);
              }
  
              $banner->image_path = $file_name;
          }
  
          $banner->save();
  
          Session::flash('success', 'Banner updated successfully.');
          Log::info('Banner updated successfully.');
  
          return redirect()->route('admin.dashboard');
      } catch (\Exception $e) {
          Log::error('Error updating banner: ' . $e->getMessage());
          Session::flash('error', 'An error occurred while updating the banner.');
          return redirect()->route('admin.dashboard');
      }
  }


  public function prdcreate()
  {
    return view('product.create');
  }

  public function prdstore(Request $request)
{
    try {
        // Validate request data
        $validated = $request->validate([
            'author_name' => 'required|exists:users,id', // Validate the author name is a string
            'name' => 'required|string|max:255',
            'image_path' => 'nullable|image',
        ]);
        Log::info('Validation successful', ['validated' => $validated]);

        $product = new HomeProduct();

        // Handle image upload
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $file_name = time().'_'.$file->getClientOriginalName();
            $filePath = 'image/home_image/' . $file_name;

            // Save the new image file
            Storage::disk('public')->put($filePath, file_get_contents($file));
            Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);

            // Delete the old image if it exists
            if (!is_null($product->image_path)) {
                Storage::disk('public')->delete('image/home_image/' . $product->image_path);
                Log::info('Old image deleted', ['old_image' => $product->image_path]);
            }

            // Update the image path
            $product->image_path = $file_name;
        }

        // Find the user
        

        // Update the HomeProduct's fields
        $product->name = $validated['name'];
        $product->image_name = $validated['name'];
        $product->user_id = $validated['author_name']; // Correctly set user_id
        $product->slug = Str::slug($validated['name']);
        Log::info('HomeProduct fields set', ['product' => $product]);

        // Save the HomeProduct
        $product->save();
        Log::info('HomeProduct saved', ['product' => $product]);

        Session::flash('success', 'Product created successfully.');
        return redirect()->route('admin.dashboard');
    } catch (\Exception $e) {
        Log::error('Error creating product: ' . $e->getMessage());
        return redirect()->route('admin.dashboard')->with('error', 'An error occurred while creating the product. ' . $e->getMessage());
    }
}


  

  public function prdupdate(Request $request, $slug)
  {
      DB::beginTransaction();
  
      try {
          Log::info('Update request received', ['slug' => $slug]);
  
          // Find the HomeProduct instance
          $product = HomeProduct::where('slug', $slug)->firstOrFail();
          Log::info('Product found', ['product' => $product]);
  
          // Validate request data
          $validated = $request->validate([
            'author_name' => 'required|exists:users,id', // Validate the author exists
            'name' => 'required|string|max:255',
              'image_path' => 'nullable|image', // Add max size validation if needed
          ]);
          Log::info('Validation successful', ['validated' => $validated]);
  
          // Prepare slug changes
          $oldSlug = $product->slug;
          $newSlug = Str::slug($validated['name']);
  
          // Handle image upload
          if ($request->hasFile('image_path')) {
              $file = $request->file('image_path');
              $fileName = time().'_'.$file->getClientOriginalName();
              $filePath = 'image/home_image/' . $fileName;
  
              // Store the file
              Storage::disk('public')->put($filePath, file_get_contents($file));
              Log::info('File uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);
  
              // Delete the old image if it exists
              if ($product->image_path && Storage::disk('public')->exists('image/home_image/' . $product->image_path)) {
                  Storage::disk('public')->delete('image/home_image/' . $product->image_path);
                  Log::info('Old image deleted', ['old_image' => $product->image_path]);
              }
  
              $product->image_path = $fileName;
          }
  
          // Find the user
          $user = User::find($validated['author_name']);
          if (!$user) {
              throw new \Exception('Author not found');
          }
  
          // Update the HomeProduct's fields
          $product->name = $validated['name'];
          $product->image_name = $validated['name'];
          $product->slug = $newSlug;
          $product->user_id = $validated['author_name'];
          Log::info('Author ID found', ['user_id' => $product->user_id]);
  
          // Save the HomeProduct
          $product->save();
          Log::info('HomeProduct updated', ['product' => $product]);
  
          // Update the detail_products table after home_products is updated
          DetailProducts::where('home_slug', $oldSlug)->update(['home_slug' => $newSlug]);
          Log::info('DetailProducts updated', ['old_slug' => $oldSlug, 'new_slug' => $newSlug]);
  
          DB::commit();
          Session::flash('success', 'Product updated successfully.');
          Log::info('Product updated successfully.');
  
          return redirect()->route('admin.dashboard');
      } catch (\Exception $e) {
          DB::rollBack();
          Log::error('Error updating product: ' . $e->getMessage());
          Session::flash('error', 'An error occurred while updating the product. ' . $e->getMessage());
          return redirect()->route('admin.dashboard');
      }
  }
  
  
  public function prddestroy($slug)
  {
    $product = HomeProduct::where('slug', $slug)->firstOrFail();
    $product->delete();
    return redirect()->back()->with('success', 'Product deleted successfully.');
  }

  public function qaupdate(Request $request, $id)
  {
      try {
          // Find the QuickAccess item
          $quickaccess = QuickAccess::findOrFail($id);
          Log::info('Qa found', ['Qa' => $quickaccess]);
  
          // Validate the request data
          $validated = $request->validate([
              'detail' => 'required|string',
              'image' => 'nullable|image',
          ]);
          Log::info('Validation successful', ['validated' => $validated]);
  
          // Update the QuickAccess item
          $quickaccess->detail = $validated['detail'];
  
          if ($request->hasFile('image')) {
              $file = $request->file('image');
              $file_name = time().'_'.$file->getClientOriginalName();
              $filePath = 'image/home_image/' . $file_name;
  
              // Save the new image file
              Storage::disk('public')->put($filePath, file_get_contents($file));
              Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
  
              // Delete the old image if it exists
              if (!is_null($quickaccess->image_path)) {
                  Storage::disk('public')->delete('image/home_image/' . $quickaccess->image_path);
                  Log::info('Old image deleted', ['old_image' => $quickaccess->image_path]);
              }
  
              // Update the image path
              $quickaccess->image_path = $file_name;
          }
  
          // Save the QuickAccess item
          $quickaccess->save();
          Session::flash('success', 'Quick access updated successfully.');
          Log::info('Quick access updated successfully.');
  
          return redirect()->route('admin.dashboard');
      } catch (\Exception $e) {
          Log::error('Error updating quick access: ' . $e->getMessage());
          Session::flash('error', 'An error occurred while updating the quick access.');
          return redirect()->route('admin.dashboard');
      }
  }
  
 
  public function newsstore(Request $request)
  {
    $validated = $request->validate([
      'link' => 'required|url',
      'author' => 'required|exists:users,id', // Validate the author exists
      'title' => 'required|string',
      'date' => 'required|date',
    ]);

    $news = new News();

    $news->title = $validated['title'];
    $news->link = $validated['link'];
    $news->date = $validated['date'];
    $news->user_id = $validated['author'];
    $news->slug = Str::slug($validated['title']);
    $news->save();

    return redirect()->route('admin.dashboard')->with('success', 'News created successfully.');
  }

  public function newsupdate(Request $request, $slug)
  {
      DB::beginTransaction();
  
      try {
          Log::info('Update request received', ['slug' => $slug]);
  
          // Find the HomeProduct instance
          $news = News::where('slug', $slug)->firstOrFail();
          Log::info('News found', ['news' => $news]);
  
          // Validate request data
          $validated = $request->validate([
              'title' => 'required|string',
              'author' => 'required|exists:users,id', // Validate the author exists
              'link' => 'nullable|url', // Add max size validation if needed
              'date' => 'nullable|date', // Add max size validation if needed
          ]);
          Log::info('Validation successful', ['validated' => $validated]);
  
          // Prepare slug changes
          $oldSlug = $news->slug;
          $newSlug = Str::slug($validated['title']);
  
  
          // Update the HomeProduct's fields
          $news->title = $validated['title'];
          $news->link = $validated['link'];
          $news->date = $validated['date'];
          $news->user_id = $validated['author'];
          $news->slug = $newSlug;
  
          // Save the HomeProduct
          $news->save();
          Log::info('News updated', ['news' => $news]);

          DB::commit();
          Session::flash('success', 'News updated successfully.');
          Log::info('News updated successfully.');
  
          return redirect()->route('admin.dashboard');
      } catch (\Exception $e) {
          DB::rollBack();
          Log::error('Error updating News: ' . $e->getMessage());
          Session::flash('error', 'An error occurred while updating the News. ' . $e->getMessage());
          return redirect()->route('admin.dashboard');
      }
  }
  
  public function newsdestroy($slug)
  {
    $news = news::where('slug', $slug)->firstOrFail();
    $news->delete();
    return redirect()->back()->with('success', 'News deleted successfully.');
  }

}