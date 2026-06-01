<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('created_at', 'DESC')->get();
        return view('backend.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->passes()) {
            $faq = new Faq();
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();

            return redirect()->back()->with('success', 'FAQ Added Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('backend.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ]);

        if ($validator->passes()) {
            $faq = Faq::find($id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();

            return redirect()->route('admin.faqs')->with('success', 'FAQ Updated Successfully');
        } else {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        Faq::find($id)->delete();
        return response()->json(['success' => true]);
    }

    public function toggleStatus(Request $request)
    {
        $faq = Faq::find($request->id);
        if ($faq) {
            $faq->status = $request->status;
            $faq->save();
            return response()->json(['success' => true, 'status' => $faq->status]);
        }
        return response()->json(['success' => false]);
    }
}
