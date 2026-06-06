<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    //This method will show slider listing
    public function index(){
        $sliders = Slider::get();
        return view('admin.slider.slider',compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[]);

        if($validator->passes()){
            $slider = Slider::create();
            $slider->title = $request->title;
            $slider->short_desc = $request->short_desc;

            if ($request->hasFile('banner')) {
                $filename = time().'.'.$request->banner->extension();
                $request->banner->move(public_path('img'), $filename);
                $slider->banner = $filename;
            }

            $slider->save();

            return redirect()->route('admin.slider')->with('success','Slider Added Successfully');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[]);

        if($validator->passes()){
            $slider = Slider::findOrFail($id);
            $slider->title = $request->title;
            $slider->short_desc = $request->short_desc;

            if ($request->has('remove_image') && $request->remove_image == 1) {
                $slider->banner = null;
            } elseif ($request->hasFile('banner')) {
                $filename = time().'.'.$request->banner->extension();
                $request->banner->move(public_path('img'), $filename);
                $slider->banner = $filename;
            }

            $slider->save();

            return redirect()->route('admin.slider')->with('success','Slider Updated Successfully');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function destroy($id){
        $destroy = Slider::where('id',$id)->delete();
        return response()->json(['success' => true]);
    }

    public function slider_toggleStatus(Request $request)
    {
        $toggle = Slider::find($request->id);
        if ($toggle) {
            $toggle->status = $request->status; // 1 ya 0
            $toggle->save();

            return response()->json(['success' => true, 'status' => $toggle->status]);
        }
        return response()->json(['success' => false]);
    }






}
