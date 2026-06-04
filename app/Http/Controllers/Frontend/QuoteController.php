<?php

namespace App\Http\Controllers\Frontend;

use App\Models\QuoteRequest;
use App\Traits\SpamProtection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    use SpamProtection;

    public function store(Request $request)
    {
        $spam = $this->checkSpam($request);
        if ($spam) {
            return response()->json(['status' => 'error', 'message' => $spam], 422);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'property_address' => 'nullable|string|max:500',
            'service_required' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        QuoteRequest::create($validator->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Quote request submitted successfully! We will get back to you soon.'
        ]);
    }
}
