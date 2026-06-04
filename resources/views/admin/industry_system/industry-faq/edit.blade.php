@extends('admin.layout.app')
@section('title', 'Edit Industry FAQ')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
      <div class="admin-card">
        <div class="admin-card-header">
          <h3 class="text-base font-semibold text-gray-900">Update Industry FAQ Record for Your Industries</h3>
        </div>
        <form action="{{route('admin.industry-faq-update',$industry_faq->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="id">
          <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
              <div class="md:col-span-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="industry_id">Select Your Industry</label>
                    </div>
                    <div class="md:col-span-3">
                        <select name="industry_id" id="industry_id" class="admin-select select2" style="width: 100%;">
                            <option value="">-- Select Your Industry --</option>
                            @foreach($industry_info as $industry)
                                <option value="{{ $industry->id }}" {{ $industry_faq->industry_id == $industry->id ? 'selected' : '' }}>
                                    {{ $industry->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

 
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="question">Questions</label>
                        <span class="text-red-500">*</span>
                    </div>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            class="admin-input @error('question') border-red-500 @enderror"
                            id="question"
                            name="question"
                            value="{{old('question',$industry_faq->question)}}"
                            placeholder="Enter Question"
                        />
                        @error('question')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <small id="questionHelp" class="text-xs text-gray-500"
                                >Update Question for your selected Industry.
                        </small>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="answer">Answer</label>
                    </div>
                    <div class="md:col-span-3">
                        <textarea id="myeditor" name="answer">{{ $industry_faq->answer }}</textarea>
                    </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="px-6 py-4 border-t border-gray-100 text-center">
            <button class="admin-btn-primary" type="submit">Submit</button>
            <a href="{{route('admin.industry-faq')}}" class="admin-btn-danger">Cancel</a>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection
