@extends('admin.layout.app')
@section('title', 'About')
@section('content')

<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
          <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">{{ $about ? 'Update About' : 'Add About' }}</h3>
          </div>
          <form action="{{ $about ? route('admin.about-update', $about->id) : route('admin.about-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="admin-card-body">
              <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-1">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
                </div>
                <div class="md:col-span-3">
                    <input
                        type="text"
                        name="title"
                        class="admin-input @error('title') border-red-500 @enderror"
                        id="title"
                        placeholder="Enter Title"
                        value="{{old('title', $about->title ?? '')}}"
                    />
                    @error('title')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                </div>
                <div class="md:col-span-3">
                    <x-file-upload name="image" label="Upload Image" :current="$about->image ?? null" />
                </div>

                <div class="md:col-span-1">
                    <label for="image2" class="block text-sm font-medium text-gray-700">Image 2</label>
                </div>
                <div class="md:col-span-3">
                    <x-file-upload name="image2" label="Upload Image 2" :current="$about->image2 ?? null" />
                </div>

                <div class="md:col-span-1">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                </div>
                <div class="md:col-span-3">
                    <textarea
                        name="description"
                        class="admin-textarea @error('description') border-red-500 @enderror"
                        id="description"
                        rows="4"
                        placeholder="Enter Description">{{old('description', $about->description ?? '')}}</textarea>
                    @error('description')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="description2" class="block text-sm font-medium text-gray-700">Description 2</label>
                </div>
                <div class="md:col-span-3">
                    <textarea
                        name="description2"
                        class="admin-textarea @error('description2') border-red-500 @enderror"
                        id="description2"
                        rows="4"
                        placeholder="Enter Description 2">{{old('description2', $about->description2 ?? '')}}</textarea>
                    @error('description2')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                </div>
                <div class="md:col-span-3">
                    <input
                        type="text"
                        name="meta_title"
                        class="admin-input"
                        id="meta_title"
                        placeholder="Enter Meta Title"
                        value="{{old('meta_title', $about->meta_title ?? '')}}"
                    />
                </div>

                <div class="md:col-span-1">
                    <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                </div>
                <div class="md:col-span-3">
                    <textarea
                        name="meta_description"
                        class="admin-textarea"
                        id="meta_description"
                        rows="3"
                        placeholder="Enter Meta Description">{{old('meta_description', $about->meta_description ?? '')}}</textarea>
                </div>

                <div class="md:col-span-1">
                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                </div>
                <div class="md:col-span-3">
                    <input
                        type="text"
                        name="meta_keywords"
                        class="admin-input"
                        id="meta_keywords"
                        placeholder="Enter Meta Keywords"
                        value="{{old('meta_keywords', $about->meta_keywords ?? '')}}"
                    />
                </div>

                <div class="md:col-span-4 border-t border-gray-200 my-2"></div>
                <div class="md:col-span-4">
                    <h4 class="text-sm font-semibold text-gray-800 mb-2">Counters</h4>
                </div>

                @php
                    $counters = [
                        1 => ['label' => 'Jobs Done'],
                        2 => ['label' => 'Roofing Awards'],
                        3 => ['label' => 'Client Satisfaction'],
                        4 => ['label' => 'Site Installers'],
                    ];
                @endphp

                @foreach ($counters as $i => $counter)
                <div class="md:col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Counter {{ $i }}</label>
                </div>
                <div class="md:col-span-3">
                    <div class="flex gap-3">
                        <input
                            type="text"
                            name="counter{{ $i }}_number"
                            class="admin-input w-1/3"
                            placeholder="e.g. 500+"
                            value="{{ old('counter'.$i.'_number', $about->{'counter'.$i.'_number'} ?? '') }}"
                        />
                        <input
                            type="text"
                            name="counter{{ $i }}_label"
                            class="admin-input w-2/3"
                            placeholder="{{ $counter['label'] }}"
                            value="{{ old('counter'.$i.'_label', $about->{'counter'.$i.'_label'} ?? '') }}"
                        />
                    </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 text-center">
              <button class="admin-btn-success" type="submit">{{ $about ? 'Update' : 'Submit' }}</button>
            </div>
          </form>
        </div>
    </div>
</div>

@endsection
