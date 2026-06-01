@extends('backend.layout.app')
@section('title', 'Create Service FAQ')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
      <div class="admin-card">
        <div class="admin-card-header">
          <h3 class="text-base font-semibold text-gray-900">Add FAQ Record for Your Services</h3>
        </div>
        <form action="{{route('admin.service-faq-store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
              <div class="md:col-span-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="service_id">Select Your Service </label>
                    </div>
                    <div class="md:col-span-3">
                        <select name="service_id" id="service_id" class="admin-select select2" data-live-search="true">
                          <option>-- Select Your Service --</option>
                          @foreach($service_info as $service)
                              <option value="{{ $service->id }}">{{ $service->title }}</option>
                          @endforeach
                        </select>
                    </div> 
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="question">Question</label>
                        <span class="text-red-500">*</span>
                    </div>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            name="question"
                            class="admin-input @error('question') border-red-500 @enderror"
                            id="question"
                            placeholder="Enter Question"
                        />
                        @error('question')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <small id="questionHelp" class="text-xs text-gray-500"
                                >Add Question for your selected Service.
                        </small>

                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="answer">Answer</label>
                    </div>
                    <div class="md:col-span-3">
                        <textarea id="myeditor" name="answer"></textarea>
                    </div> 
                </div>

              
              </div>
            </div>
          </div>
          <div class="px-6 py-4 border-t border-gray-100 text-center">
            <button class="admin-btn-primary" type="submit">Submit</button>
            <a href="{{route('admin.service-faq')}}" class="admin-btn-danger">Cancel</a>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection
