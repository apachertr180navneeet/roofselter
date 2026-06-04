<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('sort_order')->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['status'] = $request->has('status') ? 1 : 0;

        if ($request->hasFile('image')) {
            $filename = 'cert_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $filename);
            $data['image'] = $filename;
        }

        Certification::create($data);
        return redirect()->route('admin.certifications')->with('success', 'Certification added.');
    }

    public function edit($id)
    {
        $cert = Certification::findOrFail($id);
        return response()->json($cert);
    }

    public function update(Request $request, $id)
    {
        $cert = Certification::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'issue_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['status'] = $request->has('status') ? 1 : 0;

        if ($request->hasFile('image')) {
            $filename = 'cert_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $filename);
            $data['image'] = $filename;
        }

        $cert->update($data);
        return redirect()->route('admin.certifications')->with('success', 'Certification updated.');
    }

    public function destroy($id)
    {
        Certification::findOrFail($id)->delete();
        return redirect()->route('admin.certifications')->with('success', 'Certification deleted.');
    }

    public function toggleStatus(Request $request)
    {
        $cert = Certification::findOrFail($request->id);
        $cert->status = !$cert->status;
        $cert->save();
        return response()->json(['success' => true]);
    }
}
