<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Store the data in the database
        ContactRequest::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
        ]);

        // Return a success message
        return response()->json(['success' => true, 'message' => 'Message Sent Successfully!']);
    }
    public function store2(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|max:255',
            'quantity' => 'required|max:255',
        ]);

        // Store the data in the database
        ContactRequest::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'quantity' => $validatedData['quantity'],
        ]);

        // Return a success message
        return response()->json(['success' => true, 'message' => 'Message Sent Successfully!']);
    }
}
