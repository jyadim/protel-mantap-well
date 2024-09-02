<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailProducts;

class DetailProductController extends Controller
{
    // Display a listing of the resource.
    public function index($slug)
    {
        // Fetch the DetailProducts along with its related DescriptionPoints
        $detailProducts = DetailProducts::where('slug', $slug)
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
}
