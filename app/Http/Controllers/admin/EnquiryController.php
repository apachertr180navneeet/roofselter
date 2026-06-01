<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        Contact::where('is_read', 0)->update(['is_read' => 1]);
        $enquiries = Contact::latest()->get();
        return view('backend.enquiries.index', compact('enquiries'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }
        if ($request->filled('status')) {
            $query->where('enquiry_status', $request->status);
        }
        $enquiries = $query->latest()->get();
        return view('backend.enquiries.index', compact('enquiries'));
    }

    public function reply(Request $request, $id)
    {
        $enquiry = Contact::findOrFail($id);
        return redirect()->back()->with('success', 'Reply sent successfully!');
    }

    public function export()
    {
        $enquiries = Contact::latest()->get();
        $csv = "ID,Name,Email,Phone,Service Required,Property Address,Message,Status,Date\n";
        foreach ($enquiries as $e) {
            $csv .= "\"{$e->id}\",\"{$e->username}\",\"{$e->email}\",\"{$e->phone}\",\"{$e->service_required}\",\"{$e->property_address}\",\"{$e->message}\",\"{$e->enquiry_status}\",\"{$e->created_at}\"\n";
        }
        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="enquiries.csv"',
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $enquiry = Contact::findOrFail($id);
        $enquiry->enquiry_status = $request->status;
        $enquiry->save();
        return response()->json(['success' => true]);
    }

    public function enquiryCount()
    {
        $count = Contact::where('is_read', 0)->count();
        return response()->json(['count' => $count]);
    }

    public function markAllRead()
    {
        Contact::where('is_read', 0)->update(['is_read' => 1]);
        return response()->json(['status' => 'success']);
    }

    public function latest()
    {
        $notifications = Contact::orderBy('id', 'desc')
            ->take(5)
            ->get(['id','username','created_at']);

        return response()->json([
            'count' => Contact::where('is_read',0)->count(),
            'notifications' => $notifications
        ]);
    }

    public function destroy($id){
        Contact::find($id)->delete();
        return response()->json(['success' => true]);
    }
}
