<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BecomePartner;
use Illuminate\Http\Request;

class BecomePartnerAdminController extends Controller
{
    public function index()
    {
        $partners = BecomePartner::latest()->get();
        return view('backend.become-partner.index', compact('partners'));
    }

    public function destroy($id)
    {
        BecomePartner::findOrFail($id)->delete();
        return redirect()->route('admin.become-partner')->with('success', 'Partner record deleted.');
    }
}
