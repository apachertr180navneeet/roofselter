@extends('backend.layout.app')
@section('title', 'Edit Gallery Image')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Gallery Image</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Datatables</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Update Gallery Image</div>
                  </div>
                  <form action="{{route('admin.galleries-update',$gallery->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <div class="form-group">
                              <label for="image">Image</label>
                              <x-file-upload name="image" label="Upload Image" :current="$gallery->image" />
                              @error('image')
                                <p class="invalid-feedback d-block">{{$message}}</p>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label for="caption">Caption</label>
                              <input
                                  type="text"
                                  name="caption"
                                  class="form-control @error('caption') is-invalid @enderror"
                                  id="caption"
                                  placeholder="Enter caption"
                                  value="{{old('caption',$gallery->caption)}}"
                              />
                              @error('caption')
                                <p class="invalid-feedback">{{$message}}</p>
                              @enderror
                          </div>

                          <div class="form-group">
                              <label for="sort_order">Sort Order</label>
                              <input
                                  type="number"
                                  name="sort_order"
                                  class="form-control @error('sort_order') is-invalid @enderror"
                                  id="sort_order"
                                  placeholder="0"
                                  value="{{old('sort_order',$gallery->sort_order)}}"
                              />
                              @error('sort_order')
                                <p class="invalid-feedback">{{$message}}</p>
                              @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-action text-center">
                      <button class="btn btn-success" type="submit">Submit</button>
                      <a href="{{route('admin.galleries')}}" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
