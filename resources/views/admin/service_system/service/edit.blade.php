@extends('admin.layout.app')
@section('title', 'Edit Service')
@section('content')
<div class="space-y-6">
    <form action="{{route('admin.service-update',$service->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="max-w-4xl mx-auto">
        <div class="admin-card">
          <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Update Record for Service</h3>
          </div>
          <input type="hidden" name="id" value="id">
          <div class="admin-card-body space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
              <label class="text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
              <div class="md:col-span-3">
                <input
                  type="text"
                  class="admin-input @error('title') border-red-500 @enderror"
                  id="title"
                  name="title"
                  onkeyup="makeSlug(this.value)"
                  value="{{old('title',$service->title)}}"
                  placeholder="Enter Title" />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                <p id="titleHelp2" class="text-xs text-gray-500 mt-1">This title your service heading.</p>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
              <label class="text-sm font-medium text-gray-700">Slug <span class="text-red-500">*</span></label>
              <div class="md:col-span-3">
                <input
                  type="text"
                  class="admin-input"
                  id="slug"
                  name="slug"
                  value="{{$service->slug}}"
                  placeholder="slug" />
                <p id="slug" class="text-xs text-gray-500 mt-1">create a slug from your title.</p>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
              <label class="text-sm font-medium text-gray-700">Image</label>
              <div class="md:col-span-3">
                <x-file-upload name="image" label="Upload Image" :current="$service->image" />
                <p id="image" class="text-xs text-gray-500 mt-1">This Image show in your service Image section.</p>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
              <label for="short_descripition" class="text-sm font-medium text-gray-700">Short Description</label>
              <div class="md:col-span-3">
                <textarea id="short_description" class="admin-textarea" rows="4" name="short_description">{{ $service->short_description }}</textarea>
              </div>
            </div>
          </div>
          <div class="px-6 py-4 border-t border-gray-100 text-center">
            <button class="admin-btn-primary" type="submit">submit</button>
            <a href="{{route('admin.service')}}" class="admin-btn-danger">Cancel</a>
          </div>
        </div>
      </div>
    </form>
</div>

@endsection

@section('script')
<script>
  function makeSlug(val) {
    let str = val;
    let output = str.replace(/\s+/g, '-').toLowerCase();
    $('#slug').val(output);
  }
</script>

@endsection
