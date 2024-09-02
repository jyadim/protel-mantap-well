<?php

namespace App\Http\Controllers;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
 public function index(){
    $contact_info = ContactInfo::first();

    return view('contactus', compact('contact_info'));

 }
}
