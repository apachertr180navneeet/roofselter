@extends('admin.layout.app')
@section('title', 'Edit Gallery Image')
@section('content')

<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
          <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Update Gallery Image</h3>
          </div>
          <form action="{{route('admin.galleries-update',$gallery->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="admin-card-body">
              <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-1">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image <span class="text-red-500">*</span></label>
                </div>
                <div class="md:col-span-3">
                    <x-file-upload name="image" label="Upload Image" :current="$gallery->image" />
                    @error('image')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
                </div>
                <div class="md:col-span-3">
                    <input
                        type="text"
                        name="caption"
                        class="admin-input @error('caption') border-red-500 @enderror"
                        id="caption"
                        placeholder="Enter caption"
                        value="{{old('caption',$gallery->caption)}}"
                    />
                    @error('caption')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                </div>
                <div class="md:col-span-3">
                    <input
                        type="number"
                        name="sort_order"
                        class="admin-input @error('sort_order') border-red-500 @enderror"
                        id="sort_order"
                        placeholder="0"
                        value="{{old('sort_order',$gallery->sort_order)}}"
                    />
                    @error('sort_order')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
              </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 text-center">
              <button class="admin-btn-primary" type="submit">Submit</button>
              <a href="{{route('admin.galleries')}}" class="admin-btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
</div>

@endsection
