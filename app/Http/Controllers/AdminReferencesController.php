<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Picture;
use App\Models\Products;
use App\Models\Project;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminReferencesController extends Controller
{ 
    public function index()
    {
        $product = Products::latest()->get();
        $ref = Project::latest()->get();
        // Retrieve all references with their associated partners
        $references = Reference::with('partners')->get();

        // Return a view with the data
        return view('AdminReferences', compact('references', 'product', 'ref'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            Log::info('Update request received', ['reference_id' => $id]);
    
            // Find the Reference instance
            $reference = Reference::findOrFail($id);
            Log::info('Reference found', ['reference' => $reference]);
    
            // Validate request data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);
            Log::info('Validation successful', ['validated' => $validated]);
    
            // Handle image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = 'image/references/' . $fileName;
                    Storage::disk('public')->put($filePath, file_get_contents($file));
                    Log::info('File uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);
    
                    // Delete the old image if it exists
                    if ($reference->image && Storage::disk('public')->exists($reference->image)) {
                        Storage::disk('public')->delete($reference->image);
                        Log::info('Old image deleted', ['old_image' => $reference->image]);
                    }
                    $reference->image = $fileName;
                } else {
                    Log::error('Invalid image upload.');
                }
            }
    
            // Update the Reference's fields
            $reference->title = $validated['title'];
            $reference->description = $validated['description'];
    
            // Save the Reference
            $reference->save();
            Log::info('Reference updated', ['reference' => $reference]);
    
            DB::commit();
            Session::flash('success', 'Reference updated successfully.');
            Log::info('Reference updated successfully.');
    
            return redirect()->back()->with('success', 'Reference updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating reference: ' . $e->getMessage());
            Session::flash('error', 'An error occurred while updating the reference. ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the reference.');
        }
    }
    
    public function updatePartners(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            Log::info('Update partners request received', ['reference_id' => $id]);
    
            // Find the Reference instance
            $reference = Reference::findOrFail($id);
            Log::info('Reference found', ['reference' => $reference]);
    
            // Validate request data
            $validated = $request->validate([
                'partners.*.title' => 'required|string|max:255',
                'partners.*.text' => 'required|string|max:255',
                'partners.*.link' => 'required|url',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Image for the reference
            ]);
            Log::info('Validation successful', ['validated' => $validated]);
    
            // Handle image upload for the reference
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = 'image/references/' . $fileName;
                    Storage::disk('public')->put($filePath, file_get_contents($file));
                    Log::info('Reference image uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);
    
                    // Delete the old image if it exists
                    if ($reference->image && Storage::disk('public')->exists($reference->image)) {
                        Storage::disk('public')->delete($reference->image);
                        Log::info('Old reference image deleted', ['old_image' => $reference->image]);
                    }
                    $reference->image = $fileName;
                } else {
                    Log::error('Invalid image upload for reference');
                }
            }
    
            // Process each partner update
            if ($request->has('partners')) {
                foreach ($request->input('partners') as $partnerId => $partnerData) {
                    $partner = Partner::find($partnerId);
                    if ($partner) {
                        // Update partner details
                        $partner->title = $partnerData['title'];
                        $partner->text = $partnerData['text'];
                        $partner->link = $partnerData['link'];
    
                        // Save the partner
                        $partner->save();
                        Log::info('Partner updated', ['partner' => $partner]);
                    }
                }
            }
    
            // Save the Reference with updated image if needed
            $reference->save();
            Log::info('Reference updated', ['reference' => $reference]);
    
            DB::commit();
            Session::flash('success', 'Partners and reference updated successfully.');
            Log::info('Partners and reference updated successfully.');
    
            return redirect()->back()->with('success', 'Partners and reference updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating partners and reference: ' . $e->getMessage());
            Session::flash('error', 'An error occurred while updating partners and reference. ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating partners and reference.');
        }
    }
    public function edit($slug)
    {
        $project = Project::where('slug', $slug)
            ->with('pictures') // Assuming there's a relationship defined in the Project model
            ->firstOrFail();
            $product = Products::latest()->get();
            $ref = Project::latest()->get();
        return view('AdminDetailReferences', compact('project', 'product', 'ref'));
    }

    public function detailstore(Request $request)
    {
        DB::beginTransaction();
    
        try {
            // Validate request data
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:png,jpg,jpeg',
                'maps' => 'required|url',
                'region' => 'required|string|max:255',
                'description' => 'nullable|string', // Make sure description is optional
                'project_id' => 'required|integer', // Ensure this is included and validated
            ]);
    
            // Create a new picture entry
            $picture = new Picture();
            $picture->title = $request->input('title');
            $picture->maps = $request->input('maps');
            $picture->region = $request->input('region');
            $picture->description = $request->input('description', ''); // Provide default empty string if null
            $picture->project_id = $request->input('project_id'); // Set project_id
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = 'image/references/' . $fileName;
                    Storage::disk('public')->put($filePath, file_get_contents($file));
                    $picture->image = $fileName;
                }
            }
    
            $picture->save();
            DB::commit();
    
            // Fetch project slug for redirection
            $project = Project::findOrFail($request->input('project_id'));
    
            return redirect()->route('gallery.edit', ['slug' => $project->slug])
                ->with('success', 'Picture added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error adding picture: ' . $e->getMessage());
    
            // Fetch project slug for redirection
            $projectSlug = '';
    
            if ($request->has('project_id')) {
                $project = Project::find($request->input('project_id'));
                if ($project) {
                    $projectSlug = $project->slug;
                }
            }
    
            return redirect()->route('gallery.edit', ['slug' => $projectSlug])
                ->with('error', 'An error occurred while adding the picture.' . $e->getMessage());
        }
    }
    

    public function detailupdate(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            // Validate request data
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:png,jpg,jpeg',
                'maps' => 'required|url',
                'region' => 'required|string|max:255',
                'description' => 'nullable|string',
                'project_id' => 'required|integer', // Ensure this is included and validated
            ]);
    
            // Find the picture instance
            $picture = Picture::findOrFail($id);
            $project = $picture->project; // Fetch related project
    
            $picture->title = $request->input('title');
            $picture->maps = $request->input('maps');
            $picture->region = $request->input('region');
            $picture->description = $request->input('description');
            $picture->project_id = $request->input('project_id'); // Set project_id
    
            if ($request->hasFile('image')) {
                // Optionally delete the old image
                if ($picture->image && Storage::disk('public')->exists('image/references/' . $picture->image)) {
                    Storage::disk('public')->delete('images/' . $picture->image);
                }
                $file = $request->file('image');
                if ($file->isValid()) {
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $filePath = 'image/references/' . $fileName;
                    Storage::disk('public')->put($filePath, file_get_contents($file));
                    $picture->image = $fileName;
                }
            }
    
            $picture->save();
            DB::commit();
    
            return redirect()->route('gallery.edit', ['slug' => $project->slug])
                ->with('success', 'Picture updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating picture: ' . $e->getMessage());
    
            // Fetch the project slug for redirecting
            $picture = Picture::find($id);
            $slug = $picture ? $picture->project->slug : '';
    
            return redirect()->route('gallery.edit', ['slug' => $slug])
                ->with('error', 'An error occurred while updating the picture.');
        }
    }
    

    public function detaildestroy($id)
{
    DB::beginTransaction();

    try {
        Log::info('Attempting to delete picture with ID: ' . $id);

        $picture = Picture::find($id);
        
        if (!$picture) {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException('Picture not found');
        }

        // Optionally delete the image file from storage
        if ($picture->image && Storage::disk('public')->exists('image/references/' . $picture->image)) {
            Storage::disk('public')->delete('image/references/' . $picture->image);
            Log::info('Deleted image file: ' . $picture->image);
        }

        $picture->delete();
        DB::commit();

        return redirect()->back()->with('success', 'Picture deleted successfully.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        DB::rollBack();
        Log::error('Picture not found: ' . $e->getMessage());

        return redirect()->back()->with('error', 'The picture you are trying to delete does not exist.');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error deleting picture: ' . $e->getMessage());

        return redirect()->back()->with('error', 'An error occurred while deleting the picture: ' . $e->getMessage());
    }
}

}

