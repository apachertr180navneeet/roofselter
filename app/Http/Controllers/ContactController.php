<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'phone'    => 'required|string|max:30',
            'date'     => 'nullable|string|max:255',
            'message'  => 'nullable|string',
            'email'    => 'nullable|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Save into DB
        $contact = Contact::create([
            'username' => $request->username,
            'phone'    => $request->phone,
            'date'     => $request->date,
            'message'  => $request->message,
            'email'    => $request->email,
            'status'   => 0,
        ]);

        // Send mail to admin (use config('mail.from.address') or set admin email)
        $adminEmail = config('mail.from.address') ?? 'sydneycrownroofingandgutters@gmail.com';
        // For production prefer ->queue(...) if queue configured
        Mail::to($adminEmail)->send(new ContactAdminMail($contact));

        // Optional: send confirmation to user if provided
        if (!empty($contact->email)) {
            Mail::to($contact->email)->send(new ContactUserMail($contact));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you! We will contact you soon.'
        ]);
    }
}

