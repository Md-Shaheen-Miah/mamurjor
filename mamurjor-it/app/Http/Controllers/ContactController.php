<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json($contact);
    }

    
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json($contact);
    }

    
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['message' => 'Contact deleted successfully']);
    }

  
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }
}
