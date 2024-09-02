<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class DetailGalleryController extends Controller
{
    public function index($slug)
    {
        $detail_gallery = Project::with('pictures')->where('slug', $slug)->firstOrFail();
        return view('detail_gallery', compact('detail_gallery'));
    }
}
