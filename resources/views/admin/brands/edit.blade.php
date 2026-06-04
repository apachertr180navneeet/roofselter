@extends('admin.layout.app')
@section('title', 'Edit Brand')
@section('content')

<div class="space-y-6">
    <div class="max-w-2xl mx-auto">
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="card-title">Update Brand or Partner Record</div>
            </div>
            <form action="{{route('admin.brands-update',$brands->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id">
                <div class="admin-card-body">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <label for="brand_name">Brand Name</label>
                            <span class="text-red-500">*</span>
                        </div>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                name="brand_name"
                                class="admin-input @error('brand_name') border-red-500 @enderror"
                                id="brand_name"
                                value="{{old('brand_name',$brands->brand_name)}}"
                                placeholder="Enter Brand"
                            />
                            @error('brand_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <small id="brand_nameHelp2" class="text-xs text-gray-500">
                                    This Brand name your Business Partner Brand Name.
                            </small>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                        <div class="md:col-span-1">
                            <label for="image">Image</label>
                        </div>
                        <div class="md:col-span-3">
                            <x-file-upload name="image" label="Upload Image" :current="$brands->image" />
                            <small id="image" class="text-xs text-gray-500">
                                    This Image show in your Brand Image section.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-100 text-center">
                    <button class="admin-btn-primary" type="submit">Submit</button>
                    <a href="{{route('admin.brands')}}" class="admin-btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
