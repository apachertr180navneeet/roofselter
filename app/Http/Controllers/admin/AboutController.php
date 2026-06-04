<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::orderBy('created_at', 'DESC')->first();
        return view('admin.about_system.about.index', compact('about'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->passes()) {
            $about = new About();
            $about->title = $request->title;
            $about->slug = Str::slug($request->title);
            $about->description = $request->description;
            $about->description2 = $request->description2;
            $about->meta_title = $request->meta_title;
            $about->meta_description = $request->meta_description;
            $about->meta_keywords = $request->meta_keywords;
            $about->counter1_number = $request->counter1_number;
            $about->counter1_label = $request->counter1_label;
            $about->counter2_number = $request->counter2_number;
            $about->counter2_label = $request->counter2_label;
            $about->counter3_number = $request->counter3_number;
            $about->counter3_label = $request->counter3_label;
            $about->counter4_number = $request->counter4_number;
            $about->counter4_label = $request->counter4_label;

            if ($request->hasFile('image')) {
                $filename = time() . '.' . $request->image->extension();
                $request->image->move(public_path('img'), $filename);
                $about->image = $filename;
            }

            if ($request->hasFile('image2')) {
                $filename = time() . '_2.' . $request->image2->extension();
                $request->image2->move(public_path('img'), $filename);
                $about->image2 = $filename;
            }

            $about->save();

            return redirect()->route('admin.about')->with('success', 'About Added Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->passes()) {
            $about = About::findOrFail($id);
            $about->title = $request->title;
            $about->slug = Str::slug($request->title);
            $about->description = $request->description;
            $about->description2 = $request->description2;
            $about->meta_title = $request->meta_title;
            $about->meta_description = $request->meta_description;
            $about->meta_keywords = $request->meta_keywords;
            $about->counter1_number = $request->counter1_number;
            $about->counter1_label = $request->counter1_label;
            $about->counter2_number = $request->counter2_number;
            $about->counter2_label = $request->counter2_label;
            $about->counter3_number = $request->counter3_number;
            $about->counter3_label = $request->counter3_label;
            $about->counter4_number = $request->counter4_number;
            $about->counter4_label = $request->counter4_label;

            if ($request->input('remove_image') == "1") {
                if ($about->image && file_exists(public_path('img/' . $about->image))) {
                    unlink(public_path('img/' . $about->image));
                }
                $about->image = null;
            }

            if ($request->hasFile('image')) {
                if ($about->image && file_exists(public_path('img/' . $about->image))) {
                    unlink(public_path('img/' . $about->image));
                }
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img'), $filename);
                $about->image = $filename;
            }

            if ($request->input('remove_image2') == "1") {
                if ($about->image2 && file_exists(public_path('img/' . $about->image2))) {
                    unlink(public_path('img/' . $about->image2));
                }
                $about->image2 = null;
            }

            if ($request->hasFile('image2')) {
                if ($about->image2 && file_exists(public_path('img/' . $about->image2))) {
                    unlink(public_path('img/' . $about->image2));
                }
                $file = $request->file('image2');
                $filename = time() . '_2_' . $file->getClientOriginalName();
                $file->move(public_path('img'), $filename);
                $about->image2 = $filename;
            }

            $about->save();

            return redirect()->route('admin.about')->with('success', 'About Updated Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        About::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request)
    {
        $about = About::find($request->id);
        if ($about) {
            $about->status = $request->status;
            $about->save();
            return response()->json(['success' => true, 'status' => $about->status]);
        }
        return response()->json(['success' => false]);
    }
}
