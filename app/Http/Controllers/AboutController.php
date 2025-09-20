<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\About;
use App\Models\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::latest()->get();
        $team = Team::latest()->get();
        return view('about', compact('about', 'team'));

    }
    
    public function pdfdownload($id)
{
    // Find the 'About' record by ID
    $about = About::findOrFail($id);

    // Check if the associated PDF exists
    if (!$about->pdf_path) {
        return redirect()->back()->with('error', 'We\'re sorry, brochure not available yet.');
    }

    // Get the file name stored in the database
    $fileName = $about->pdf_path; // This should be the file name

    // Construct the full file path relative to 'public/storage/pdfs'
    $filePath = "pdfs/{$fileName}";

    // Check if the file exists in storage
    if (!Storage::disk('public')->exists($filePath)) {
        return redirect()->back()->with('error', 'We\'re sorry, brochure not available yet.');
    }

    // Return the file as a response for download
    return response()->download(storage_path("app/public/{$filePath}"));
}

}
