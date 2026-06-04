@extends('admin.layout.app')
@section('title', 'Brands')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <div class="card-title">Brand or Partner Info</div>
                </div>
                <div class="overflow-x-auto">
                    <div class="table-responsive">
                        <table class="admin-table" id="basic-datatables">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col" class="text-center">Brand Image</th>
                                    <th scope="col" class="text-center">Brand Name</th>
                                    <th scope="col" class="text-center">Published</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                <tr id="record-row-{{ $brand->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="avatar">
                                            <img src="{{asset($brand->image ? 'img/'.$brand->image : 'panel-assets/assets/img/placeholder-image.svg')}}" alt="{{ $brand->brands_name }}" class="avatar-img rounded">
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $brand->brand_name ? $brand->brand_name : '--' }}</td>
                                    <td class="text-center">
                                        <label class="switch">
                                          <input type="checkbox" class="toggle-status" data-id="{{ $brand->id }}" data-url="{{ route('admin.brands-status') }}" {{ $brand->status == 1 ? 'checked' : '' }}>
                                          <span class="record-toggle"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-button-action">
                                            <a href="{{route('admin.brands-edit',$brand->id)}}"
                                               class="admin-btn-primary admin-btn-icon mr-2">
                                               <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                               class="admin-btn-danger admin-btn-icon delete-record"
                                               data-id="{{ $brand->id }}"
                                               data-url="{{ route('admin.brands-destroy', $brand->id) }}">
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
        <div class="md:col-span-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <div class="card-title">Add Brand or Partner Record</div>
                </div>
                <form action="{{route('admin.brands-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="admin-card-body">
                        <div class="mb-4">
                            <label for="brand_name">Brand Name</label>
                            <span class="text-red-500">*</span>
                            <input
                                type="text"
                                name="brand_name"
                                class="admin-input @error('brand_name') border-red-500 @enderror"
                                id="brand_name"
                                placeholder="Enter Brand"
                            />
                            @error('brand_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <small id="brand_nameHelp2" class="text-xs text-gray-500">
                                    This Brand name your Partner Brands Name.
                            </small>
                        </div>

                        <div class="mb-4">
                            <label for="image">Image</label>
                            <x-file-upload name="image" label="Upload Image" />
                            <small id="image" class="text-xs text-gray-500">
                                    This Image show in your Brands Image section.
                            </small>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-100 text-center">
                        <button class="admin-btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

