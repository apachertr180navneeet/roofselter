@extends('backend.layout.app')
@section('title', 'Edit Project')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Update Project Post</div>
                    </div>
                    <form action="{{route('admin.blog-update',$blog->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $blog->id }}">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="projectTabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="details-tab" data-bs-toggle="tab" href="#details">Details</a></li>
                                <li class="nav-item"><a class="nav-link" id="gallery-tab" data-bs-toggle="tab" href="#gallery">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo">SEO</a></li>
                            </ul>
                            <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="details">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Title <span class="text-danger">*</span></label></div>
                                        <div class="col-md-9">
                                            <input type="text" name="title" onkeyup="makeSlug(this.value)" class="form-control @error('title') is-invalid @enderror" value="{{old('title',$blog->title)}}">
                                            @error('title')<p class="invalid-feedback">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Slug <span class="text-danger">*</span></label></div>
                                        <div class="col-md-9"><input type="text" class="form-control" name="slug" id="slug" value="{{$blog->slug}}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Category</label></div>
                                        <div class="col-md-9">
                                            <select name="category_id" class="form-select select2" style="width: 100%;">
                                                <option value="">-- Select Category --</option>
                                                @foreach($blog_categories as $category)
                                                    <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Service Type</label></div>
                                        <div class="col-md-9">
                                            <select name="service_type" class="form-select">
                                                <option value="">-- Select Type --</option>
                                                <option value="residential" {{ $blog->service_type == 'residential' ? 'selected' : '' }}>Residential</option>
                                                <option value="commercial" {{ $blog->service_type == 'commercial' ? 'selected' : '' }}>Commercial</option>
                                                <option value="industrial" {{ $blog->service_type == 'industrial' ? 'selected' : '' }}>Industrial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Location</label></div>
                                        <div class="col-md-9"><input type="text" name="location" class="form-control" value="{{ $blog->location }}" placeholder="e.g. Sydney, NSW"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Completion Date</label></div>
                                        <div class="col-md-9"><input type="date" name="completion_date" class="form-control" value="{{ $blog->completion_date ? \Carbon\Carbon::parse($blog->completion_date)->format('Y-m-d') : '' }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Featured Image</label></div>
                                        <div class="col-md-9"><x-file-upload name="image" label="Upload Image" :current="$blog->image" /></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Short Description</label></div>
                                        <div class="col-md-9"><textarea class="form-control" rows="3" name="short_description">{{ $blog->short_description }}</textarea></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Full Description</label></div>
                                        <div class="col-md-9"><textarea id="myeditor" name="description">{{ $blog->description }}</textarea></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="gallery">
                                    @if($blog->galleryImages->count() > 0)
                                    <div class="row mb-3">
                                        @foreach($blog->galleryImages as $img)
                                        <div class="col-md-3 mb-3" id="gallery-img-{{ $img->id }}">
                                            <div class="card">
                                                <img src="{{ asset('img/'.$img->image) }}" class="card-img-top" style="height:150px;object-fit:cover;" alt="">
                                                <div class="card-body p-2 text-center">
                                                    <button type="button" class="btn btn-sm btn-danger delete-gallery-image" data-id="{{ $img->id }}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Add More Images</label>
                                            <input type="file" name="gallery_images[]" class="form-control" multiple accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seo">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Meta Title</label></div>
                                        <div class="col-md-9"><input type="text" name="meta_title" class="form-control" value="{{ $blog->meta_title }}"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Meta Description</label></div>
                                        <div class="col-md-9"><textarea name="meta_description" class="form-control" rows="3">{{ $blog->meta_description }}</textarea></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Meta Keywords</label></div>
                                        <div class="col-md-9"><input type="text" name="meta_keywords" class="form-control" value="{{ $blog->meta_keywords }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action text-center">
                            <button class="btn btn-success" type="submit">Update</button>
                            <a href="{{route('admin.blog')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
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
        var url = '{{ route("admin.blog.destroy-gallery", "") }}' + '/' + id;
        $.get(url, function() {
            $('#gallery-img-' + id).fadeOut();
        });
    });
</script>
@endsection
