<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\HomeProduct;
use App\Models\News;
use App\Models\QuickAccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminHomeController extends Controller
{
  public function index()
  {
    $banner = Banner::with('author')->latest()->get();
    $prodhome = HomeProduct::with('author')->latest()->get();
    $quickaccess = QuickAccess::with('author')->latest()->get();
    $news = News::with('author')->latest()->get();
    return view('dashboardAdmin', compact('banner', 'prodhome', 'quickaccess', 'news'));
  }

  public function prdcreate()
  {
    return view('product.create');
  }

  public function prdstore(Request $request)
  {
    $validated = $request->validate([
      'author_name' => 'required|string|max:255',
      'name' => 'required|string|max:255',
      'image_path' => 'nullable|image',
    ]);

    $product = new HomeProduct();
    if ($request->hasFile('image_path')) {
      $file = $request->file('image_path');
      $file_name = time() . '_' . $file->getClientOriginalName();
      $filePath = 'image/' . $file_name;

      Storage::disk('public')->put($filePath, file_get_contents($file));
      Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);

      if (!is_null($product->image_path)) {
          Storage::disk('public')->delete('image/' . $product->image_path);
          Log::info('Old image deleted', ['old_image' => $product->image_path]);
      }

      $product->image_path = $file_name;
  }
    $product->name = $validated['name'];
    $product->user_id = User::where('name', $validated['author_name'])->first()->id;
    $product->image_name = $validated['name'];
    $product->slug = Str::slug($validated['name']);
    $product->save();

    return redirect()->route('admin.dashboard')->with('success', 'Product created successfully.');
  }

  public function prdshow($slug)
  {
    $product = HomeProduct::where('slug', $slug)->firstOrFail();
    return view('product.show', compact('product'));
  }


  
  public function prdupdate(Request $request, $slug)
  {
      try {
          Log::info('Update request received', ['slug' => $slug]);
  
          $product = HomeProduct::where('slug', $slug)->firstOrFail();
          Log::info('Product found', ['product' => $product]);
  
          $validated = $request->validate([
              'author_name' => 'required|string|max:255',
              'name' => 'required|string|max:255',
              'image_path' => 'nullable|image',
          ]);
          Log::info('Validation successful', ['validated' => $validated]);
  
          $product->name = $validated['name'];
          $product->user_id = User::where('name', $validated['author_name'])->firstOrFail()->id;
          Log::info('Author ID found', ['user_id' => $product->user_id]);
  
          if ($request->hasFile('image_path')) {
              $file = $request->file('image_path');
              $file_name = time() . '_' . $file->getClientOriginalName();
              $filePath = 'image/' . $file_name;
  
              Storage::disk('public')->put($filePath, file_get_contents($file));
              Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
  
              if (!is_null($product->image_path)) {
                  Storage::disk('public')->delete('image/' . $product->image_path);
                  Log::info('Old image deleted', ['old_image' => $product->image_path]);
              }
  
              $product->image_path = $file_name;
          }
  
          if ($product->isDirty('name')) {
              $product->slug = Str::slug($validated['name']);
          }
  
          if ($product->save()) {
              Session::flash('success', 'Product updated successfully.');
              Log::info('Product updated successfully.');
          } else {
              Session::flash('error', 'Product update failed.');
              Log::error('Product update failed.');
          }
  
          return redirect()->route('admin.dashboard');
      } catch (\Exception $e) {
          Log::error('Error updating product: ' . $e->getMessage());
          Session::flash('error', 'An error occurred while updating the product.' . $e->getMessage());
          return redirect()->route('admin.dashboard');
      }
  }
  
  
  
  

  public function prddestroy($slug)
  {
    $product = HomeProduct::where('slug', $slug)->firstOrFail();
    $product->delete();
    return redirect()->back()->with('success', 'Product deleted successfully.');
  }
}
