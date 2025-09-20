<?php
namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Partners;
use App\Models\pdf_ref;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ReferenceController extends controller
{
    public function index()
    {
        // Retrieve all references with their associated partners and each partner's associated partner details
        $references = Reference::with('partners')->get();
        $partners = Partners::with('partners')->get();
        // Return a view with the data
        return view('gallery', compact('references', 'partners'));
    }
    


    public function pdfdownload($id)
    {
        // Find the 'About' record by ID
        $ref = pdf_ref::find($id); // Use find() instead of findOrFail()
    
        // Check if the reference was found
        if (!$ref) {
            return redirect()->back()->with('error', 'We\'re sorry, brochure not available yet.');
        }
    
        // Check if the associated PDF path is set
        if (empty($ref->pdf_path)) {
            return redirect()->back()->with('error', 'We\'re sorry, brochure not available yet.');
        }
    
        // Get the file name stored in the database
        $fileName = $ref->pdf_path; // This should be the file name
    
        // Construct the full file path relative to 'public/storage/pdfs'
        $filePath = "pdfs/{$fileName}";
    
        // Check if the file exists in storage
        if (!Storage::disk('public')->exists($filePath)) {
            // Log the file path being checked
            Log::info("File path: {$filePath} does not exist.");
            
            // Redirect back with a notification if the file doesn't exist
            return redirect()->back()->with('error', 'We\'re sorry, brochure not available yet.');
        }
    
        // Return the file as a response for download
        return response()->download(storage_path("app/public/{$filePath}"));
    }
    
    
}

