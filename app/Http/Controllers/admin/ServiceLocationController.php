<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceLocationController extends Controller
{
    public function index()
    {
        $locations = ServiceLocation::orderBy('sort_order')->get();
        return view('admin.service_locations.index', compact('locations'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->passes()) {
            $maxOrder = ServiceLocation::max('sort_order') ?? 0;
            ServiceLocation::create([
                'name' => $request->name,
                'is_active' => $request->is_active ?? 1,
                'sort_order' => $maxOrder + 1,
            ]);
            return redirect()->back()->with('success', 'Location Added Successfully');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    }

    public function edit($id)
    {
        $location = ServiceLocation::findOrFail($id);
        $locations = ServiceLocation::orderBy('sort_order')->get();
        return view('admin.service_locations.index', compact('location', 'locations'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->passes()) {
            $update = ServiceLocation::findOrFail($id);
            $update->name = $request->name;
            $update->is_active = $request->is_active ?? 0;
            $update->save();
            return redirect()->route('admin.service-locations')->with('success', 'Location Updated Successfully');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    }

    public function destroy($id)
    {
        ServiceLocation::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request)
    {
        $toggle = ServiceLocation::find($request->id);
        if ($toggle) {
            $toggle->is_active = $request->status;
            $toggle->save();
            return response()->json(['success' => true, 'status' => $toggle->is_active]);
        }
        return response()->json(['success' => false]);
    }
}
