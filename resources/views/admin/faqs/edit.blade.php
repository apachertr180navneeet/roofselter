@extends('admin.layout.app')
@section('title', 'Edit FAQ')
@section('content')

<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
          <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Update FAQ</h3>
          </div>
          <form action="{{route('admin.faqs-update',$faq->id)}}" method="post">
            @csrf
            <div class="admin-card-body">
              <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-1">
                    <label for="question" class="block text-sm font-medium text-gray-700">Question <span class="text-red-500">*</span></label>
                </div>
                <div class="md:col-span-3">
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

                <div class="md:col-span-1">
                    <label for="answer" class="block text-sm font-medium text-gray-700">Answer <span class="text-red-500">*</span></label>
                </div>
                <div class="md:col-span-3">
                    <textarea
                        name="answer"
                        class="admin-textarea @error('answer') border-red-500 @enderror"
                        id="answer"
                        rows="6">{{old('answer',$faq->answer)}}</textarea>
                    @error('answer')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
              </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 text-center">
              <button class="admin-btn-primary" type="submit">Submit</button>
              <a href="{{route('admin.faqs')}}" class="admin-btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
</div>

@endsection
