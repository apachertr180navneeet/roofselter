@extends('admin.layout.app')
@section('title', 'Edit Service Category')
@section('content')

<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
          <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Update Record for Service Category</h3>
          </div>
          <form action="{{route('admin.service-category-update',$edit->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="id" name="id">
            <div class="admin-card-body space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <label class="text-sm font-medium text-gray-700">Category Name <span class="text-red-500">*</span></label>
                    <div class="md:col-span-3">
                        <input
                            type="text"
                            name="category_name"
                            onkeyup="makeSlug(this.value)"
                            class="admin-input @error('category_name') border-red-500 @enderror"
                            id="cat_name"
                            value="{{old('category_name',$edit->category_name)}}"
                            placeholder="Enter Category"
                        />
                        @error('category_name')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <p id="cat_nameHelp2" class="text-xs text-gray-500 mt-1">This Category name your Service Category Name.</p>
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
                        <p id="slug" class="text-xs text-gray-500 mt-1">creating a slug from your category name.</p>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 text-center">
              <button class="admin-btn-primary" type="submit">Submit</button>
              <a href="{{route('admin.service-category')}}" class="admin-btn-danger">Cancel</a>
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
