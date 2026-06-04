@extends('admin.layout.app')
@section('title', 'Edit FAQ')
@section('content')

<div class="space-y-6">
    <div class="max-w-2xl mx-auto">
        <div class="admin-card">
          <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Update FAQ</h3>
          </div>
          <form action="{{route('admin.faqs-update',$faq->id)}}" method="post">
            @csrf
            <div class="admin-card-body">
              <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="question" class="font-medium text-gray-700">Question</label>
                    <span class="text-danger">*</span>
                    <input
                        type="text"
                        name="question"
                        class="admin-input @error('question') border-red-500 @enderror"
                        id="question"
                        value="{{old('question',$faq->question)}}"
                        placeholder="Enter Question"
                    />
                    @error('question')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label for="answer" class="font-medium text-gray-700">Answer</label>
                    <span class="text-danger">*</span>
                    <textarea
                        name="answer"
                        class="admin-textarea @error('answer') border-red-500 @enderror"
                        id="answer"
                        rows="4"
                        placeholder="Enter Answer">{{old('answer',$faq->answer)}}</textarea>
                    @error('answer')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
              </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 text-center">
              <button class="admin-btn-success" type="submit">Submit</button>
              <a href="{{route('admin.faqs')}}" class="admin-btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
</div>

@endsection
