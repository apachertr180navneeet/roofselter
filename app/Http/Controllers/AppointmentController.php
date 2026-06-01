<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Traits\SpamProtection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    use SpamProtection;

    public function store(Request $request)
    {
        $spam = $this->checkSpam($request);
        if ($spam) {
            return response()->json(['status' => 'error', 'message' => $spam], 422);
        }

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'service_required' => 'required|string|max:255',
            'preferred_date' => 'required|date',
            'preferred_time' => 'nullable|string|max:255',
            'additional_notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        Appointment::create($validator->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment booked successfully! We will contact you soon.'
        ]);
    }
}
