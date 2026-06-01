@extends('backend.layout.app')
@section('title', 'Create Project')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add Project Post</div>
                    </div>
                    <form action="{{route('admin.blog-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                            <input type="text" name="title" onkeyup="makeSlug(this.value)" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title">
                                            @error('title')<p class="invalid-feedback">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Slug <span class="text-danger">*</span></label></div>
                                        <div class="col-md-9"><input type="text" class="form-control" name="slug" id="slug" placeholder="slug"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Category</label></div>
                                        <div class="col-md-9">
                                            <select name="category_id" class="form-select select2">
                                                <option value="">-- Select Category --</option>
                                                @foreach($blog_categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Service Type</label></div>
                                        <div class="col-md-9">
                                            <select name="service_type" class="form-select">
                                                <option value="">-- Select Type --</option>
                                                <option value="residential">Residential</option>
                                                <option value="commercial">Commercial</option>
                                                <option value="industrial">Industrial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Location</label></div>
                                        <div class="col-md-9"><input type="text" name="location" class="form-control" placeholder="e.g. Sydney, NSW"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Completion Date</label></div>
                                        <div class="col-md-9"><input type="date" name="completion_date" class="form-control"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Featured Image</label></div>
                                        <div class="col-md-9"><x-file-upload name="image" label="Upload Image" /></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Short Description</label></div>
                                        <div class="col-md-9"><textarea class="form-control" rows="3" name="short_description"></textarea></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Full Description</label></div>
                                        <div class="col-md-9"><textarea id="myeditor" name="description"></textarea></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="gallery">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label>Upload Project Images</label>
                                            <input type="file" name="gallery_images[]" class="form-control" multiple accept="image/*">
                                            <small class="form-text text-muted">You can select multiple images. Supported: jpg, png, webp</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="seo">
                                    <div class="form-group row">
                                        <div class="col-md-3"><label>Meta Title</label></div>
                                        <div class="col-md-9"><input type="text" name="meta_title" class="form-control" placeholder="SEO Title"></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Meta Description</label></div>
                                        <div class="col-md-9"><textarea name="meta_description" class="form-control" rows="3" placeholder="SEO Description"></textarea></div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <div class="col-md-3"><label>Meta Keywords</label></div>
                                        <div class="col-md-9"><input type="text" name="meta_keywords" class="form-control" placeholder="keyword1, keyword2, keyword3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action text-center">
                            <button class="btn btn-success" type="submit">Submit</button>
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
</script>
@endsection
