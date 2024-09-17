<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
 public function index(){
    $contact_info = ContactInfo::first();

    return view('contactus', compact('contact_info'));

 }
 public function sendContactForm(Request $request)
 {
     // Validate the form input
     $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|email|max:255',
         'phone' => 'required|numeric',
         'address' => 'required|string',
         'message' => 'required|string',
         'verify' => 'required|string',
     ]);
 
     // Prepare the data for the email
     $data = [
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'address' => $request->address,
         'message' => $request->message,
         'verify' => $request->verify,
     ];
 
     try {
         Mail::to('admin@pme-bandung.com')->send(new ContactUs($data));
     } catch (\Exception $e) {
         return redirect()->back()->with('error', 'Error sending email: ' . $e->getMessage());
     }
 
     return redirect()->back()->with('success', 'Your message has been sent successfully!');
 }
 
 
 
}

