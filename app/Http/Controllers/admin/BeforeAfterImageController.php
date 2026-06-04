<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BeforeAfterImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeforeAfterImageController extends Controller
{
    public function index()
    {
        $images = BeforeAfterImage::orderBy('sort_order')->get();
        return view('admin.before-after.index', compact('images'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'before_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'after_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'category' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['status'] = $request->has('status') ? 1 : 0;

        if ($request->hasFile('before_image')) {
            $file = $request->file('before_image');
            $filename = 'before_' . time() . '.' . $file->extension();
            $file->move(public_path('img'), $filename);
            $data['before_image'] = $filename;
        }

        if ($request->hasFile('after_image')) {
            $file = $request->file('after_image');
            $filename = 'after_' . time() . '.' . $file->extension();
            $file->move(public_path('img'), $filename);
            $data['after_image'] = $filename;
        }

        BeforeAfterImage::create($data);

        return redirect()->route('admin.before-after')->with('success', 'Before/After image added successfully.');
    }

    public function edit($id)
    {
        $image = BeforeAfterImage::findOrFail($id);
        return response()->json($image);
    }

    public function update(Request $request, $id)
    {
        $image = BeforeAfterImage::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'category' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['status'] = $request->has('status') ? 1 : 0;

        if ($request->hasFile('before_image')) {
            $file = $request->file('before_image');
            $filename = 'before_' . time() . '.' . $file->extension();
            $file->move(public_path('img'), $filename);
            $data['before_image'] = $filename;
        }

        if ($request->hasFile('after_image')) {
            $file = $request->file('after_image');
            $filename = 'after_' . time() . '.' . $file->extension();
            $file->move(public_path('img'), $filename);
            $data['after_image'] = $filename;
        }

        $image->update($data);

        return redirect()->route('admin.before-after')->with('success', 'Before/After image updated successfully.');
    }

    public function destroy($id)
    {
        $image = BeforeAfterImage::findOrFail($id);
        $image->delete();
        return redirect()->route('admin.before-after')->with('success', 'Before/After image deleted.');
    }

    public function toggleStatus(Request $request)
    {
        $image = BeforeAfterImage::findOrFail($request->id);
        $image->status = !$image->status;
        $image->save();
        return response()->json(['success' => true]);
    }
}
