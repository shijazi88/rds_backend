<?php

namespace App\Http\Controllers;

use App\Models\DeleteRequest;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function index()
    {
        return view('delete-account');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits_between:10,15',
            'reason' => 'required|string',
        ]);

        // Store the delete request
        DeleteRequest::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'reason' => $request->reason,
        ]);

        return redirect()->route('delete-account.index')->with('success', 'Your delete request has been submitted.');
    }
}
