<?php
namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends controller
{
    public function index()
    {
        // Retrieve all references with their associated partners
        $references = Reference::with('partners')->get();

        // Return a view with the data
        return view('gallery', compact('references'));
    }

    public function show($slug)
    {
        // Find a reference by slug and load its associated partners
        $reference = Reference::with('partners')->where('slug', $slug)->firstOrFail();

        // Return a view with the data
        return view('references.show', compact('reference'));
    }

    // Optional: Additional methods for creating, storing, editing, updating, and deleting references
    public function create()
    {
        return view('references.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:references',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $reference = Reference::create($data);

        return redirect()->route('references.show', $reference->slug);
    }

    public function edit($slug)
    {
        $reference = Reference::where('slug', $slug)->firstOrFail();

        return view('references.edit', compact('reference'));
    }

    public function update(Request $request, $slug)
    {
        $reference = Reference::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:references,slug,' . $reference->id,
            'image' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $reference->update($data);

        return redirect()->route('references.show', $reference->slug);
    }

    public function destroy($slug)
    {
        $reference = Reference::where('slug', $slug)->firstOrFail();
        $reference->delete();

        return redirect()->route('references.index');
    }
}

