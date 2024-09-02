<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Products::get();
        return view('product', compact('product'));

    }

   
}

