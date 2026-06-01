@extends('backend.layout.app')
@section('title', 'Gallery')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Gallery</h3>
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
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Gallery Images</div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="basic-datatables">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Published</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galleries as $gallery)
                                    <tr id="record-row-{{ $gallery->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <div class="avatar">
                                                <img src="{{ asset($gallery->image ? 'img/'.$gallery->image : '../assets/img/placeholder-image-3.jpg') }}" alt="{{ $gallery->caption }}" class="avatar-img rounded" style="width:80px;height:60px;object-fit:cover;">
                                            </div>
                                        </td>
                                        <td>{{ $gallery->caption ?? '--' }}</td>
                                        <td class="text-center">{{ $gallery->sort_order }}</td>
                                        <td class="text-center">
                                            <label class="switch">
                                              <input type="checkbox" class="toggle-status" data-id="{{ $gallery->id }}" data-url="{{ route('admin.galleries-status') }}" {{ $gallery->status == 1 ? 'checked' : '' }}>
                                              <span class="record-toggle"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-button-action">
                                                <a href="{{route('admin.galleries-edit',$gallery->id)}}"
                                                   class="btn btn-link btn-primary btn-lg me-2">
                                                   <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                   class="btn btn-link btn-danger btn-lg delete-record"
                                                   data-id="{{ $gallery->id }}"
                                                   data-url="{{ route('admin.galleries-destroy', $gallery->id) }}">
                                                   <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Add Gallery Image</div>
                  </div>
                  <form action="{{route('admin.galleries-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <div class="form-group">
                              <label for="image">Image</label>
                              <span class="text-danger">*</span>
                              <x-file-upload name="image" label="Upload Image" />
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
                                  value="{{old('caption')}}"
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
                                  value="{{old('sort_order', 0)}}"
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
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
