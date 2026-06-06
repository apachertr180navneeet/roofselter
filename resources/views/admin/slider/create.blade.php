@extends('admin.layout.app')
@section('title', 'Add Slider')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="text-base font-semibold text-gray-900">Add Slider</h3>
            </div>
            <form action="{{route('admin.slider-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1"><label class="font-medium text-gray-700">Title</label></div>
                        <div class="md:col-span-3">
                            <input type="text" name="title" class="admin-input" placeholder="Enter slider title" value="{{ old('title') }}">
                        </div>

                        <div class="md:col-span-1"><label class="font-medium text-gray-700">Short Description</label></div>
                        <div class="md:col-span-3">
                            <input type="text" name="short_desc" class="admin-input" placeholder="Enter short description" value="{{ old('short_desc') }}">
                        </div>

                        <div class="md:col-span-1"><label class="font-medium text-gray-700">Banner Image</label></div>
                        <div class="md:col-span-3">
                            <input type="file" name="banner" class="admin-input" accept="image/*">
                            @error('banner')<p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-6 gap-2">
                        <a href="{{ route('admin.slider') }}" class="admin-btn-secondary">Cancel</a>
                        <button type="submit" class="admin-btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
