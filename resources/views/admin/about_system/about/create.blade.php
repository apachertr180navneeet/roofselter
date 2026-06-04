@extends('admin.layout.app')
@section('title', 'Create About')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
      <div class="admin-card">
        <div class="admin-card-header">
          <h3 class="text-base font-semibold text-gray-900">Add Record for About Us</h3>
        </div>
        <form action="{{route('admin.about-store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
              <div class="md:col-span-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="title2">Title</label>
                        <span class="text-red-500">*</span>
                    </div>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            name="title"
                            onkeyup="makeSlug(this.value)"
                            class="admin-input @error('title') border-red-500 @enderror"
                            id="title2"
                            placeholder="Enter Title"
                        />
                        @error('title')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <small id="titleHelp2" class="text-xs text-gray-500"
                                >This title your about-us heading.
                        </small>

                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="slug">Slug</label>
                        <span class="text-red-500">*</span>
                    </div>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            class="admin-input"
                            name="slug"
                            id="slug"
                            placeholder="slug"
                            
                        />
                        <small id="slug" class="text-xs text-gray-500"
                                >creating a slug from your title.
                        </small>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 hidden">
                    <div>
                        <label for="category_name">Select Category</label>
                    </div>
                    <div class="md:col-span-3">
                        <select name="category_id" id="category_id" class="admin-select select2" data-live-search="true">
                          <option value="">-- Select Category --</option>
                          @foreach($about_categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach
                        </select>
                    </div> 
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="image">Image</label>
                    </div>
                    <div class="md:col-span-3">
                        
                        <x-file-upload name="image" label="Upload Image" />

                        <small id="image" class="text-xs text-gray-500"
                                >This Image show in your about-us Image section.
                        </small>
                    </div> 
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="descripition">Description</label>
                    </div>
                    <div class="md:col-span-3">
                        <textarea id="myeditor" name="description"></textarea>
                    </div> 
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 hidden">
                    <div>
                        <label for="description2">Description 2</label>
                    </div>
                    <div class="md:col-span-3">
                        <textarea id="myeditor" name="description2"></textarea>
                    </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="px-6 py-4 border-t border-gray-100 text-center">
            <button class="admin-btn-primary" type="submit">Submit</button>
            <a href="{{route('admin.about')}}" class="admin-btn-danger">Cancel</a>
          </div>
        </form>
      </div>
    </div>
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
