@extends('backend.layout.app')
@section('title', 'Edit Service Benefit')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
      <div class="admin-card">
        <div class="admin-card-header">
          <h3 class="text-base font-semibold text-gray-900">Update Benefits Record for Your Services</h3>
        </div>
        <form action="{{route('admin.service-benefits-update',$service_benefits->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="id">
          <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
              <div class="md:col-span-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="service_id">Select Your Service</label>
                    </div>
                    <div class="md:col-span-3">
                        <select name="service_id" id="service_id" class="admin-select select2" style="width: 100%;">
                            <option value="">-- Select Your Service --</option>
                            @foreach($service_info as $service)
                                <option value="{{ $service->id }}" {{ $service_benefits->service_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

 
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="title">Title</label>
                        <span class="text-red-500">*</span>
                    </div>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            class="admin-input @error('title') border-red-500 @enderror"
                            id="title"
                            name="title"
                            value="{{old('title',$service_benefits->title)}}"
                            placeholder="Enter Title"
                        />
                        @error('title')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <small id="titleHelp" class="text-xs text-gray-500"
                                >Update Title for your selected Service.
                        </small>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="icon">Select Your Icon </label>
                    </div>
                    <div class="md:col-span-3">
                        <select name="icon" id="icon" class="admin-select select2" data-selected="{{ $service_benefits->icon ?? '' }}" data-live-search="true">
                          
                        </select>
                    </div> 
                </div>

                
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="description">Description</label>
                    </div>
                    <div class="md:col-span-3">
                        <textarea id="myeditor" name="description">{{ $service_benefits->description }}</textarea>
                    </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="px-6 py-4 border-t border-gray-100 text-center">
            <button class="admin-btn-primary" type="submit">Submit</button>
            <a href="{{route('admin.service-benefits')}}" class="admin-btn-danger">Cancel</a>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection
