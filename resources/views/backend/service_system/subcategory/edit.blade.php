@extends('backend.layout.app')
@section('title', 'Edit Service Subcategory')
@section('content')

<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
          <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Update Record for Service Sub Category</h3>
          </div>
          <form action="{{route('admin.service-subcategory-update',$edit->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="id" name="id">
            <div class="admin-card-body space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <label class="text-sm font-medium text-gray-700">Sub Category Name <span class="text-red-500">*</span></label>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            name="subcategory_name"
                            onkeyup="makeSlug(this.value)"
                            class="admin-input @error('subcategory_name') border-red-500 @enderror"
                            id="cat_name"
                            value="{{old('subcategory_name',$edit->subcategory_name)}}"
                            placeholder="Enter Sub Category"
                        />
                        @error('subcategory_name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <p id="cat_nameHelp2" class="text-xs text-gray-500 mt-1">This Category name your Service Sub Category Name.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <label class="text-sm font-medium text-gray-700">Slug <span class="text-red-500">*</span></label>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            class="admin-input"
                            name="slug"
                            id="slug"
                            value="{{$edit->slug}}"
                            placeholder="slug"
                        />
                        <p id="slug" class="text-xs text-gray-500 mt-1">creating a slug from your sub category name.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <label class="text-sm font-medium text-gray-700">Select Category</label>
                    <div class="md:col-span-3">
                        <select name="category_id" id="category_id" class="admin-select select2" style="width: 100%;">
                            <option value="">-- Select Category --</option>
                            @foreach($service_categories as $category)
                                <option value="{{ $category->id }}" {{ $edit->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 text-center">
              <button class="admin-btn-primary" type="submit">Submit</button>
              <a href="{{route('admin.service-subcategory')}}" class="admin-btn-danger">Cancel</a>
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
