<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use App\Traits\SpamProtection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use SpamProtection;

    public function store(Request $request)
    {
        $spam = $this->checkSpam($request);
        if ($spam) {
            return response()->json(['status' => 'error', 'message' => $spam], 422);
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'phone'    => 'required|string|max:30',
            'date'     => 'nullable|string|max:255',
            'message'  => 'nullable|string',
            'email'    => 'nullable|email|max:255',
            'service_required' => 'nullable|string|max:255',
            'property_address' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $contact = Contact::create([
            'username' => $request->username,
            'phone'    => $request->phone,
            'date'     => $request->date,
            'message'  => $request->message,
            'email'    => $request->email,
            'service_required' => $request->service_required,
            'property_address' => $request->property_address,
            'status'   => 0,
            'is_read'  => 0,
            'enquiry_status' => 'new',
        ]);

        $adminEmail = config('mail.from.address') ?? 'sydneycrownroofingandgutters@gmail.com';
        Mail::to($adminEmail)->send(new ContactAdminMail($contact));

        if (!empty($contact->email)) {
            Mail::to($contact->email)->send(new ContactUserMail($contact));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you! We will contact you soon.'
        ]);
    }
}
