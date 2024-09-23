<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailProducts;
use App\Models\PDF;
use Illuminate\Support\Facades\Storage;

class DetailProductController extends Controller
{
    // Display a listing of the resource.
    public function index($slug)
    {
        // Cek apakah slug adalah home_slug atau prod_slug
        $detailProducts = DetailProducts::where('slug', $slug)
            ->orWhere('home_slug', $slug)
            ->with('descriptionPoints')
            ->firstOrFail();

        return view('detail_product', compact('detailProducts'));
    }
    

    // Show the form for creating a new resource.
    public function create()
    {
        return view('detail_products.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:detail_products,slug',
            'video' => 'required|string',
            'image1' => 'required|string',
            'image2' => 'required|string',
            'description_point' => 'required|array',
        ]);

        DetailProducts::create($request->all());

        return redirect()->route('detail_products.index')->with('success', 'Detail Product created successfully.');
    }

    // Display the specified resource.
    public function show($slug)
    {
        $detailProduct = DetailProducts::where('slug', $slug)->firstOrFail();
        return view('detail_products.show', compact('detailProduct'));
    }

    // Show the form for editing the specified resource.
    public function edit($slug)
    {
        $detailProduct = DetailProducts::where('slug', $slug)->firstOrFail();
        return view('detail_products.edit', compact('detailProduct'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|string',
            'image' => 'required|string',
            'description_point' => 'required|array',
        ]);

        $detailProduct = DetailProducts::where('slug', $slug)->firstOrFail();
        $detailProduct->update($request->all());

        return redirect()->route('detail_products.index')->with('success', 'Detail Product updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($slug)
    {
        $detailProduct = DetailProducts::where('slug', $slug)->firstOrFail();
        $detailProduct->delete();

        return redirect()->route('detail_products.index')->with('success', 'Detail Product deleted successfully.');
    }
    public function pdfdownload($slug)
    {
        // Find the product by slug
        $product = DetailProducts::where('slug', $slug)->firstOrFail();
    
        // Find the associated PDF using the product's ID
        $pdf = PDF::where('products_id', $product->id)->first();
        if (!$pdf) {
            return redirect()->back()->with('error', 'We\'re sorry, brochure not available yet.');
        }
    
        // Get the file name stored in the database
        $fileName = $pdf->file_path; // This should just be the file name
    
        // Construct the full file path relative to 'public/storage/pdfs'
        $filePath = "pdfs/{$fileName}";
    
        // Check if the file exists
        if (!Storage::disk('public')->exists($filePath)) {
            return redirect()->back()->with('error', 'We\'re sorry, brochure not available yet.');
        }
    
        // Return the file as a response for download
        return response()->download(public_path("storage/{$filePath}"));
    }
    

}
