<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index()
    {
        $quotes = QuoteRequest::latest()->get();
        return view('backend.quotes.index', compact('quotes'));
    }

    public function count()
    {
        $count = QuoteRequest::where('status', QuoteRequest::STATUS_NEW)->count();
        return response()->json(['count' => $count]);
    }

    public function updateStatus(Request $request, $id)
    {
        $quote = QuoteRequest::findOrFail($id);
        $quote->status = $request->status;
        $quote->save();

        return redirect()->back()->with('success', 'Quote status updated!');
    }

    public function destroy($id)
    {
        QuoteRequest::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
