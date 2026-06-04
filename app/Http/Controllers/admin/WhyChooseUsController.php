<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $items = WhyChooseUs::orderBy('sort_order')->get();
        return view('admin.why_choose_us.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        WhyChooseUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.why-choose-us')->with('success', 'Item added successfully!');
    }

    public function edit($id)
    {
        $item = WhyChooseUs::findOrFail($id);
        return view('admin.why_choose_us.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $item = WhyChooseUs::findOrFail($id);
        $item->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.why-choose-us')->with('success', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        WhyChooseUs::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request)
    {
        $item = WhyChooseUs::find($request->id);
        if ($item) {
            $item->status = $request->status;
            $item->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
