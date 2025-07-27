<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function submit(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'details' => 'nullable|string',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'service' => $request->input('service'),
            'timeline' => $request->input('timeline'),
            'details' => $request->input('details'),
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}

