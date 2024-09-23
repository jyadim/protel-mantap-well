<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::latest()->get();
        $team = Team::latest()->get();
        return view('about', compact('about', 'team'));

    }
    
}
