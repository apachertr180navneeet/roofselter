@extends('admin.layout.app')
@section('title', 'Create Project')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
            <div class="admin-card-header"><h3 class="text-base font-semibold text-gray-900">Add Project Post</h3></div>
            <form action="{{route('admin.blog-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body">
                    <ul class="nav nav-tabs" id="projectTabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="details-tab" data-bs-toggle="tab" href="#details">Details</a></li>
                        <li class="nav-item"><a class="nav-link" id="gallery-tab" data-bs-toggle="tab" href="#gallery">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo">SEO</a></li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="details">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Title <span class="text-danger">*</span></label></div>
                                <div class="md:col-span-3">
                                    <input type="text" name="title" onkeyup="makeSlug(this.value)" class="admin-input @error('title') border-red-500 @enderror" placeholder="Enter project title" value="{{ old('title') }}">
                                    @error('title')<p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Slug <span class="text-danger">*</span></label></div>
                                <div class="md:col-span-3">
                                    <input type="text" class="admin-input" name="slug" id="slug" placeholder="auto-generated-slug" value="{{ old('slug') }}">
                                    <p class="text-xs text-gray-500 mt-1">Auto-generated from title. Edit if needed.</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Service Type</label></div>
                                <div class="md:col-span-3">
                                    <select name="service_type" class="admin-select">
                                        <option value="">-- Select Type --</option>
                                        <option value="residential" {{ old('service_type') == 'residential' ? 'selected' : '' }}>Residential</option>
                                        <option value="commercial" {{ old('service_type') == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                        <option value="industrial" {{ old('service_type') == 'industrial' ? 'selected' : '' }}>Industrial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Location</label></div>
                                <div class="md:col-span-3">
                                    <input type="text" name="location" class="admin-input" placeholder="e.g. Sydney, NSW" value="{{ old('location') }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Completion Date</label></div>
                                <div class="md:col-span-3"><input type="date" name="completion_date" class="admin-input" value="{{ old('completion_date') }}"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Featured Image</label></div>
                                <div class="md:col-span-3">
                                    <x-file-upload name="image" label="Upload Image" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Short Description</label></div>
                                <div class="md:col-span-3">
                                    <textarea class="admin-textarea" rows="3" name="short_description" placeholder="Brief project summary">{{ old('short_description') }}</textarea>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Full Description</label></div>
                                <div class="md:col-span-3"><textarea id="myeditor" name="description">{{ old('description') }}</textarea></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gallery">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label class="font-medium text-gray-700">Upload Project Images</label>
                                    <input type="file" name="gallery_images[]" class="admin-input mt-1" multiple accept="image/*">
                                    <p class="text-xs text-gray-500 mt-1">You can select multiple images. Supported: jpg, png, webp</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seo">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Meta Title</label></div>
                                <div class="md:col-span-3"><input type="text" name="meta_title" class="admin-input" placeholder="SEO Title" value="{{ old('meta_title') }}"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Meta Description</label></div>
                                <div class="md:col-span-3"><textarea name="meta_description" class="admin-textarea" rows="3" placeholder="SEO Description">{{ old('meta_description') }}</textarea></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Meta Keywords</label></div>
                                <div class="md:col-span-3"><input type="text" name="meta_keywords" class="admin-input" placeholder="keyword1, keyword2, keyword3" value="{{ old('meta_keywords') }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-100 text-center flex gap-2 justify-center">
                    <button class="admin-btn-success" type="submit">Submit</button>
                    <a href="{{route('admin.blog')}}" class="admin-btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function makeSlug(val) {
        $('#slug').val(val.replace(/\s+/g, '-').toLowerCase());
    }
</script>
@endsection
