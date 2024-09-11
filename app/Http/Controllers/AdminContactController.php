<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Products;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminContactController extends Controller
{
   public function index()
   {
      $contact_info = ContactInfo::first();
      $product = Products::latest()->get();
      $ref = Project::latest()->get();
      return view('AdminContact', compact('contact_info', 'product', 'ref'));
   }
   public function contactupdate(Request $request, $id)
   {
       DB::beginTransaction();
   
       try {
           $contact_info = ContactInfo::findOrFail($id);
   
           $request->validate([
               'email' => 'nullable|email',
               'phone' => 'nullable|string',
               'office_phone' => 'nullable|string',
               'company_address' => 'nullable|string',
               'link_maps' => 'nullable|url'
           ]);
   
           // Update the contact details
           $contact_info->update([
               'email' => $request->input('email'),
               'mobile' => $request->input('phone'),
               'land_line' => $request->input('office_phone'),
               'address' => $request->input('company_address'),
               'link_maps' => $request->input('link_maps'),
           ]);
   
           DB::commit();
           return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
       } catch (\Exception $e) {
           DB::rollBack();
           Log::error('Error updating contact: ' . $e->getMessage());
           return redirect()->route('contact.index')->with('error', 'An error occurred while updating the contact.');
       }
   }
   
}
