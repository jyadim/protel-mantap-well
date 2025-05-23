<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Products;
use App\Models\Project;
use App\Models\Reference;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminAboutController extends Controller
{
    public function index()
    {
        $about = About::latest()->get();
        $team = Team::latest()->get();
        $product = Products::latest()->get();
        $ref = Project::latest()->get();
        return view('aboutAdmin', compact('about', 'team', 'product', 'ref'));

    }
    public function edit(Request $request, $id)
    {
        try {
            $about = About::findOrFail($id);
            Log::info('About found', ['about' => $about]);
    
            $validated = $request->validate([
                'image_path' => 'nullable|image',
                'description1' => 'required|string',
                'description2' => 'nullable|string',
            ]);
            Log::info('Validation successful', ['validated' => $validated]);
    
            $about->description1 = $validated['description1'];
            $about->description2 = $validated['description2'];
      
    
            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                $file_name = time().'_'.$file->getClientOriginalName();
                $filePath = 'image/about/' . $file_name;
    
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
    
                if (!is_null($about->image_path)) {
                    Storage::disk('public')->delete('image/about/' . $about->image_path);
                    Log::info('Old image deleted', ['old_image' => $about->image_path]);
                }
    
                $about->image_path = $file_name;
            }
    
            $about->save();
    
            Session::flash('success', 'about updated successfully.');
            Log::info('about updated successfully.');
    
            return redirect()->route('about.index');
        } catch (\Exception $e) {
            Log::error('Error updating about: ' . $e->getMessage());
            Session::flash('error', 'An error occurred while updating the about.'. $e->getMessage());
            return redirect()->route('about.index');
        }
    }

    public function teamstore(Request $request)
    {
        try {
            // Validate request data
            $validated = $request->validate([
                'names' => 'required|string|max:255',
                'images' => 'nullable|image',
            ]);
            Log::info('Validation successful', ['validated' => $validated]);
    
            $team = new Team();
    
            // Handle image upload
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $file_name = time().'_'.$file->getClientOriginalName();
                $filePath = 'image/about/' . $file_name;
    
                // Save the new image file
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
    
                // Delete the old image if it exists
                if (!is_null($team->image_path)) {
                    Storage::disk('public')->delete('image/about/' . $team->image_path);
                    Log::info('Old image deleted', ['old_image' => $team->image_path]);
                }
    
                // Update the image path
                $team->image_path = $file_name;
            }
    
            // Find the user
            
    
            // Update the Team's fields
            $team->team_name = $validated['names'];
            $team->image_name = $validated['names'];
            Log::info('Team fields set', ['team' => $team]);
    
            // Save the Team
            $team->save();
            Log::info('Team saved', ['team' => $team]);
    
            Session::flash('success', 'team created successfully.');
            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            Log::error('Error creating team: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while creating the team. ' . $e->getMessage());
        }
    }

    public function teamupdate(Request $request, $id)
    {
        try {
            $team = Team::findOrFail($id);
            Log::info('Team found', ['team' => $team]);
    
            $validated = $request->validate([
                'images' => 'nullable|image',
                'names' => 'required|string',
            ]);
            Log::info('Validation successful', ['validated' => $validated]);
    
            $team->team_name = $validated['names'];
            $team->image_name = $validated['names'];
      
    
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $file_name = time().'_'.$file->getClientOriginalName();
                $filePath = 'image/about/' . $file_name;
    
                Storage::disk('public')->put($filePath, file_get_contents($file));
                Log::info('File uploaded', ['file_name' => $file_name, 'file_path' => $filePath]);
    
                if (!is_null($team->image_path)) {
                    Storage::disk('public')->delete('image/about/' . $team->image_path);
                    Log::info('Old image deleted', ['old_image' => $team->image_path]);
                }
    
                $team->image_path = $file_name;
            }
    
            $team->save();
    
            Session::flash('success', 'Team updated successfully.');
            Log::info('Team updated successfully.');
    
            return redirect()->route('about.index');
        } catch (\Exception $e) {
            Log::error('Error updating about: ' . $e->getMessage());
            Session::flash('error', 'An error occurred while updating the team.'. $e->getMessage());
            return redirect()->route('about.index');
        }
    }

    public function teamdestroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
      }
}