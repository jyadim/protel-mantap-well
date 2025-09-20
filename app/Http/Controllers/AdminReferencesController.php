<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Partners;
use App\Models\pdf_ref;
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
        $puki = Reference::latest()->get();
        // Retrieve all references with their associated partners
        $references = Reference::with('partners', 'pdf_ref')->get();
        $partners = Partners::with('partners')->get();
        // Return a view with the data
        return view('AdminReferences', compact('references', 'product', 'ref', 'puki', 'partners'));
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
    public function updateImagePartners(Request $request, $id)
    {
        // Log the request data and files to confirm the structure
        Log::info('Request data:', $request->all());
        Log::info('Request files:', $request->file());

        // Validate files within the `partner` array
        $request->validate([
            'partner.*.image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Use file() to get uploaded files
        $partnersData = $request->file('partner');
        // Check if partner data is present
        if (!$partnersData) {
            Log::warning('No partner data found in the request.');
            return redirect()->back()->with('error', 'No partner data received.');
        }

        DB::beginTransaction();

        try {
            foreach ($partnersData as $partnerId => $partnerData) {
                // Find the partner by ID in the database
                $partner = Partners::find($partnerId);

                if ($partner && isset($partnerData['image_path']) && $partnerData['image_path']->isValid()) {
                    // Get the uploaded file
                    $file = $partnerData['image_path'];
                    $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                    $filePath = 'image/references/' . $fileName;

                    // Store the new file
                    Storage::disk('public')->put($filePath, file_get_contents($file));
                    Log::info('New partner image uploaded', ['file_name' => $fileName, 'file_path' => $filePath]);

                    // Delete the old image if it exists
                    if ($partner->image_path && Storage::disk('public')->exists('image/references/' . $partner->image_path)) {
                        Storage::disk('public')->delete('image/references/' . $partner->image_path);
                        Log::info('Old partner image deleted', ['old_image' => $partner->image_path]);
                    }

                    // Update the partner's image path in the database
                    $partner->image_path = $fileName;
                    $partner->save();
                } else {
                    Log::warning('Image path or partner not found', ['partner_id' => $partnerId]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Partner images updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating partners: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating partners. ' . $e->getMessage());
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
            ]);
            Log::info('Validation successful', ['validated' => $validated]);



            // Process each partner detail update in the partners table
            if ($request->has('partners')) {
                foreach ($request->input('partners') as $partnerDetailId => $partnerData) {
                    $partnerDetail = Partner::find($partnerDetailId); // Use `Partners` model for the `partners` table
                    if ($partnerDetail) {
                        // Update partner details
                        $partnerDetail->title = $partnerData['title'];
                        $partnerDetail->text = $partnerData['text'];
                        $partnerDetail->link = $partnerData['link'];

                        // Save the partner details
                        $partnerDetail->save();
                        Log::info('Partner details updated', ['partner_detail' => $partnerDetail]);
                    } else {
                        Log::warning('Partner detail not found', ['partner_detail_id' => $partnerDetailId]);
                    }
                }
            }

            // Save the Reference with updated details if needed
            $reference->save();
            Log::info('Reference updated', ['reference' => $reference]);

            DB::commit();
            Session::flash('success', 'Partners and reference updated successfully.');
            Log::info('Partners and reference updated successfully.');

            return redirect()->back()->with('success', 'Partners and reference updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating partners and reference: ' . $e->getMessage());
            Session::flash('error', 'An error occurred while updating partners and reference.');
            return redirect()->back()->with('error', 'An error occurred while updating partners and reference. ' . $e->getMessage());
        }
    }

    public function store(Request $request, $referenceId)
    {
        $request->validate([
            'partner' => 'required|integer|max:255',
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        // Store the partner
        $partner = new Partner();
        $partner->reference_id = $referenceId;
        $partner->partner_id = $request->partner;
        $partner->title = $request->title;
        $partner->text = $request->text;
        $partner->link = $request->link;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('references', 'public');
            $partner->image = $imagePath;
        }

        $partner->save();

        return redirect()->back()->with('success', 'Partner added successfully.');
    }

    // Delete partner
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        // Optionally delete image file if needed
        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }

        $partner->delete();

        return redirect()->back()->with('success', 'Partner deleted successfully.');
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
    public function storePDF(Request $request, $id)
    {
        // Validate input fields
        $request->validate([
            'pdf' => 'required|mimes:pdf',
            'title' => 'required|string|max:255',
        ]);

        // Check if any reference already has a PDF


        // Proceed only if no PDFs are uploaded across references
            $reference = Reference::findOrFail($id);

            // Handle file upload
            $file = $request->file('pdf');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Unique name
            $path = $file->storeAs('pdfs', $fileName, 'public');

            // Save PDF details in the database
            $reference->pdf_ref()->create([
                'reference_id' => '1',
                'pdf_title' => $request->title,
                'pdf_path' => $fileName,
            ]);

            return redirect()->back()->with('success', 'PDF uploaded successfully');
        
    }
    // Update PDF
    // Delete PDF
    public function destroyPDF($id)
    {
        $ref = pdf_ref::where('id', $id)->first();

        // Delete the file from storage if it exists
        if ($ref->pdf_path) {
            Storage::disk('public')->delete('pdfs/' . $ref->pdf_path);
        }

        $ref->delete();

        return redirect()->back()->with('success', 'PDF deleted successfully');
    }
}
