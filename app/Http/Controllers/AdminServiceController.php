<?php

namespace App\Http\Controllers;

use App\Models\PictService;
use App\Models\Picture;
use App\Models\Products;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminServiceController extends Controller
{
    public function index()
    {
        $product = Products::latest()->get();
        $ref = Project::latest()->get();
        $services = Service::with('pictures')->get();
        return view('AdminService', compact('services', 'product', 'ref'));
    }

    public function servicestore(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'desc' => 'required|string',
                'pictures.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            // Create a new Service
            $service = Service::create([
                'title' => $request->title,
                'desc' => $request->desc,
            ]);

            // Handle picture uploads if available
            if ($request->hasFile('pictures')) {
                foreach ($request->file('pictures') as $index => $picture) {
                    $filename = 'serviceimage' . Str::random(10) . '.' . $picture->getClientOriginalExtension();
                    $filePath = 'image/service_image/' . $filename;
                    Storage::disk('public')->put($filePath, file_get_contents($picture));
                    $service->pictures()->create(['image_path' => $filename]);
                }
            }

            DB::commit();
            return redirect()->route('service.index')->with('success', 'Service created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating service: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'An error occurred while creating the service.');
        }
    }

    public function serviceupdate(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $service = Service::findOrFail($id);

            $request->validate([
                'title' => 'required|string|max:255',
                'desc' => 'required|string',
                'pictures.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            // Update the service details
            $service->update([
                'title' => $request->title,
                'desc' => $request->desc,
            ]);

            // Handle picture updates if available
            if ($request->hasFile('pictures')) {
                foreach ($request->file('pictures') as $index => $picture) {
                    $filename = 'serviceimage' . Str::random(10) . '.' . $picture->getClientOriginalExtension();
                    $filePath = 'image/service_image/' . $filename;
                    Storage::disk('public')->put($filePath, file_get_contents($picture));
                    $service->pictures()->create(['image_path' => $filename]);
                }
            }

            DB::commit();
            return redirect()->route('service.index')->with('success', 'Service updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating service: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'An error occurred while updating the service.');
        }
    }

    public function servicedestroy($id)
    {
        DB::beginTransaction();

        try {
            $service = Service::findOrFail($id);

            // Delete associated pictures
            foreach ($service->pictures as $picture) {
                if (Storage::disk('public')->exists($picture->image_path)) {
                    Storage::disk('public')->delete($picture->image_path);
                }
                $picture->delete();
            }

            // Delete the service
            $service->delete();

            DB::commit();
            return redirect()->route('service.index')->with('success', 'Service deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting service: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'An error occurred while deleting the service.');
        }
    }

    public function picturestore(Request $request, $id)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        try {
            $service = Service::findOrFail($id);
    
            $file = $request->file('image_path');
            $filename = 'serviceimage_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filePath = 'image/service_image/' . $filename;
    
            // Store the image in public storage
            Storage::disk('public')->put($filePath, file_get_contents($file));
    
            // Attach picture to the service
            $service->pictures()->create(['image_path' => $filename]);
    
            return redirect()->route('service.index')->with('success', 'Picture added successfully');
        } catch (\Exception $e) {
            Log::error('Error adding picture: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'An error occurred while adding the picture.');
        }
    }
    
    
    public function pictureupdate(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            Log::info('Attempting to update picture with ID: ' . $id);
    
            // Find the picture by ID
            $picture = PictService::findOrFail($id);
    
            Log::info('Picture found: ' . $picture->id);
    
            $request->validate([
                'image_path' => 'nullable|image',
            ]);
    
            if ($request->hasFile('image_path')) {
                Log::info('Image file detected');
    
                // Handle the old image deletion
                if ($picture->image_path && Storage::disk('public')->exists('image/service_image/' . $picture->image_path)) {
                    Log::info('Deleting old image...');
                    Storage::disk('public')->delete('image/service_image/' . $picture->image_path);
                }
    
                // Generate a new filename and store the new image
                $file = $request->file('image_path');
                $filename = 'serviceimage_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                Log::info('Generated filename: ' . $filename);
    
                $filePath = 'image/service_image/' . $filename;
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('Image saved to storage: ' . $filePath);
    
                // Update the picture record in the database
                $picture->update(['image_path' => $filename]);
                Log::info('Picture record updated in database');
            } else {
                Log::info('No image file provided');
            }
    
            DB::commit();
            return redirect()->route('service.index')->with('success', 'Service picture updated successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            Log::error('Picture not found: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'Picture not found: ' . $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating service picture: ' . $e->getMessage());
            return redirect()->route('service.index')->with('error', 'An error occurred while updating the service picture: ' . $e->getMessage());
        }
    }
    
public function picturedestroy($id)
{
    DB::beginTransaction();

    try {
        $picture = PictService::findOrFail($id);

        if ($picture->image_path && Storage::disk('public')->exists('image/service_image/' . $picture->image_path)) {
            Log::info('Deleting image: ' . 'image/service_image/' . $picture->image_path);
            Storage::disk('public')->delete('image/service_image/' . $picture->image_path);
        }

        $picture->delete();

        DB::commit();
        return redirect()->route('service.index')->with('success', 'Picture deleted successfully');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error deleting picture: ' . $e->getMessage());
        return redirect()->route('service.index')->with('error', 'An error occurred while deleting the picture.');
    }
}

}
