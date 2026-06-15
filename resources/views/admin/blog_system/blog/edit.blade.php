@extends('admin.layout.app')
@section('title', 'Edit Project')
@section('content')
<div class="space-y-6">
    <div class="max-w-4xl mx-auto">
        <div class="admin-card">
            <div class="admin-card-header"><h3 class="text-base font-semibold text-gray-900">Update Project Post</h3></div>
            <form action="{{route('admin.blog-update',$blog->id)}}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" name="title" onkeyup="makeSlug(this.value)" class="admin-input @error('title') border-red-500 @enderror" value="{{old('title',$blog->title)}}">
                                    @error('title')<p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Slug <span class="text-danger">*</span></label></div>
                                <div class="md:col-span-3">
                                    <input type="text" class="admin-input" name="slug" id="slug" value="{{$blog->slug}}">
                                    <p class="text-xs text-gray-500 mt-1">Auto-generated from title. Edit if needed.</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Service Type</label></div>
                                <div class="md:col-span-3">
                                    <select name="service_type" class="admin-select">
                                        <option value="">-- Select Type --</option>
                                        <option value="residential" {{ $blog->service_type == 'residential' ? 'selected' : '' }}>Residential</option>
                                        <option value="commercial" {{ $blog->service_type == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                        <option value="industrial" {{ $blog->service_type == 'industrial' ? 'selected' : '' }}>Industrial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Location</label></div>
                                <div class="md:col-span-3"><input type="text" name="location" class="admin-input" value="{{ $blog->location }}" placeholder="e.g. Sydney, NSW"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Completion Date</label></div>
                                <div class="md:col-span-3"><input type="date" name="completion_date" class="admin-input" value="{{ $blog->completion_date ? \Carbon\Carbon::parse($blog->completion_date)->format('Y-m-d') : '' }}"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Featured Image</label></div>
                                <div class="md:col-span-3"><x-file-upload name="image" label="Upload Image" :current="$blog->image" /></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Short Description</label></div>
                                <div class="md:col-span-3"><textarea class="admin-textarea" rows="3" name="short_description">{{ $blog->short_description }}</textarea></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Full Description</label></div>
                                <div class="md:col-span-3"><textarea id="myeditor" name="description">{{ $blog->description }}</textarea></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gallery">
                            @if($blog->galleryImages->count() > 0)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-3">
                                @foreach($blog->galleryImages as $img)
                                <div id="gallery-img-{{ $img->id }}">
                                    <div class="admin-card relative group">
                                        <img src="{{ asset('img/'.$img->image) }}" class="w-full rounded" style="height:150px;object-fit:cover;" alt="">
                                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center rounded">
                                            <button type="button" class="admin-btn-danger admin-btn-sm delete-gallery-image" data-id="{{ $img->id }}"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <hr class="mb-3">
                            @endif
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label class="font-medium text-gray-700">Add More Images</label>
                                    <input type="file" name="gallery_images[]" class="admin-input mt-1" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seo">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Meta Title</label></div>
                                <div class="md:col-span-3"><input type="text" name="meta_title" class="admin-input" value="{{ $blog->meta_title }}"></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Meta Description</label></div>
                                <div class="md:col-span-3"><textarea name="meta_description" class="admin-textarea" rows="3">{{ $blog->meta_description }}</textarea></div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                                <div class="md:col-span-1"><label class="font-medium text-gray-700">Meta Keywords</label></div>
                                <div class="md:col-span-3"><input type="text" name="meta_keywords" class="admin-input" value="{{ $blog->meta_keywords }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-100 text-center flex gap-2 justify-center">
                    <button class="admin-btn-success" type="submit">Update</button>
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
    $(document).on('click', '.delete-gallery-image', function() {
        if (!confirm('Delete this image?')) return;
        var id = $(this).data('id');
        var url = '{{ route("admin.blog.destroy-gallery", "__id__") }}'.replace('__id__', id);
        $.get(url, function() {
            $('#gallery-img-' + id).fadeOut();
        });
    });
</script>
@endsection
