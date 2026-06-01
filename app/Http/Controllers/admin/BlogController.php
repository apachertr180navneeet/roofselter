<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::latest()->get();
        return view('backend.blog_system.blog.index',compact('blogs'));
    }

    public function create(){
        $blog_categories = BlogCategory::where('status',1)->get();
        return view('backend.blog_system.blog.create',compact('blog_categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
        ]);

        if ($validator->passes()) {
            $create = new Blog();
            $create->category_id = $request->category_id;
            $create->title = $request->title;
            $create->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $create->short_description = $request->short_description;
            $create->description = $request->description;
            $create->location = $request->location;
            $create->service_type = $request->service_type;
            $create->completion_date = $request->completion_date;
            $create->meta_title = $request->meta_title;
            $create->meta_description = $request->meta_description;
            $create->meta_keywords = $request->meta_keywords;

            if ($request->hasFile('image')) {
                $filename = time().'.'.$request->image->extension();
                $request->image->move(public_path('img'), $filename);
                $create->image = $filename;
            }

            $create->save();

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $index => $file) {
                    $gFilename = time() . '_' . $index . '.' . $file->extension();
                    $file->move(public_path('img'), $gFilename);
                    ProjectImage::create([
                        'blog_id' => $create->id,
                        'image' => $gFilename,
                        'label' => $request->gallery_labels[$index] ?? null,
                        'sort_order' => $index,
                    ]);
                }
            }

            return redirect()->route('admin.blog')->with('success', 'Projects Data Added Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function edit($id){
        $blog = Blog::with('galleryImages')->find($id);
        $blog_categories = BlogCategory::where('status',1)->get();
        return view('backend.blog_system.blog.edit',compact('blog','blog_categories'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
        ]);

        if ($validator->passes()) {
            $update = Blog::find($id);
            $update->title = $request->title;
            $update->category_id = $request->category_id;
            $update->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $update->short_description = $request->short_description;
            $update->description = $request->description;
            $update->location = $request->location;
            $update->service_type = $request->service_type;
            $update->completion_date = $request->completion_date;
            $update->meta_title = $request->meta_title;
            $update->meta_description = $request->meta_description;
            $update->meta_keywords = $request->meta_keywords;

            if ($request->input('remove_image') == "1") {
                if ($update->image && file_exists(public_path('img/' . $update->image))) {
                    unlink(public_path('img/' . $update->image));
                }
                $update->image = null;
            }

            if ($request->hasFile('image')) {
                if ($update->image && file_exists(public_path('img/' . $update->image))) {
                    unlink(public_path('img/' . $update->image));
                }
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img'), $filename);
                $update->image = $filename;
            }

            $update->save();

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $index => $file) {
                    $gFilename = time() . '_gallery_' . $index . '.' . $file->extension();
                    $file->move(public_path('img'), $gFilename);
                    ProjectImage::create([
                        'blog_id' => $update->id,
                        'image' => $gFilename,
                        'label' => $request->gallery_labels[$index] ?? null,
                        'sort_order' => $index,
                    ]);
                }
            }

            return redirect()->route('admin.blog')->with('success', 'Projects Data Updated Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function uploadGalleryImage(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'label' => 'nullable|string|max:255',
        ]);

        $file = $request->file('image');
        $filename = time() . '_gallery.' . $file->extension();
        $file->move(public_path('img'), $filename);

        $image = ProjectImage::create([
            'blog_id' => $request->blog_id,
            'image' => $filename,
            'label' => $request->label,
            'sort_order' => ProjectImage::where('blog_id', $request->blog_id)->count(),
        ]);

        return response()->json(['success' => true, 'image' => $image]);
    }

    public function destroyGalleryImage($id)
    {
        $image = ProjectImage::findOrFail($id);
        if ($image->image && file_exists(public_path('img/' . $image->image))) {
            unlink(public_path('img/' . $image->image));
        }
        $image->delete();
        return response()->json(['success' => true]);
    }

    public function destroy($id){
        Blog::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public function blog_toggleStatus(Request $request)
    {
        $toggle = Blog::find($request->id);
        if ($toggle) {
            $toggle->status = $request->status;
            $toggle->save();
            return response()->json(['success' => true, 'status' => $toggle->status]);
        }
        return response()->json(['success' => false]);
    }
}
