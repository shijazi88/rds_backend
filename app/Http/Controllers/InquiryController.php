<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryMail;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
        ]);

        // Send an email (ensure you have configured your mail settings in .env)
        Mail::to('gneemamjad@gmail.com')->send(new InquiryMail($validatedData));

        return response()->json(['message' => 'Inquiry submitted successfully.'], 200);
    }
}