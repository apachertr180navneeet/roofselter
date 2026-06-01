<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order')->get();
        return view('backend.galleries.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gallery = new Gallery();
        $gallery->caption = $request->caption;
        $gallery->sort_order = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $filename);
            $gallery->image = $filename;
        }

        $gallery->save();

        return redirect()->back()->with('success', 'Gallery image added successfully.');
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('backend.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gallery = Gallery::find($id);

        if ($request->input('remove_image') == "1") {
            if ($gallery->image && file_exists(public_path('img/' . $gallery->image))) {
                unlink(public_path('img/' . $gallery->image));
            }
            $gallery->image = null;
        }

        if ($request->hasFile('image')) {
            if ($gallery->image && file_exists(public_path('img/' . $gallery->image))) {
                unlink(public_path('img/' . $gallery->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $gallery->image = $filename;
        }

        $gallery->caption = $request->caption;
        $gallery->sort_order = $request->sort_order ?? 0;
        $gallery->save();

        return redirect()->route('admin.galleries')->with('success', 'Gallery image updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery->image && file_exists(public_path('img/' . $gallery->image))) {
            unlink(public_path('img/' . $gallery->image));
        }
        $gallery->delete();
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request)
    {
        $gallery = Gallery::find($request->id);
        if ($gallery) {
            $gallery->status = $request->status;
            $gallery->save();
            return response()->json(['success' => true, 'status' => $gallery->status]);
        }
        return response()->json(['success' => false]);
    }
}
