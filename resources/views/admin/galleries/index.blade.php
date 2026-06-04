@extends('admin.layout.app')
@section('title', 'Gallery')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="text-base font-semibold text-gray-900">Gallery Images</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="admin-table" id="basic-datatables">
                        <thead>
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
                                    <div class="inline-flex">
                                        <img src="{{ asset($gallery->image ? 'img/'.$gallery->image : '../panel-assets/assets/img/placeholder-image-3.jpg') }}" alt="{{ $gallery->caption }}" class="rounded-lg object-cover" style="width:80px;height:60px;object-fit:cover;">
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
                                           class="admin-btn-secondary admin-btn-icon me-2">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="admin-btn-danger admin-btn-icon delete-record"
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
        <div class="md:col-span-4">
            <div class="admin-card">
              <div class="admin-card-header">
                <h3 class="text-base font-semibold text-gray-900">Add Gallery Image</h3>
              </div>
              <form action="{{route('admin.galleries-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body">
                  <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Image <span class="text-red-500">*</span></label>
                        <x-file-upload name="image" label="Upload Image" />
                        @error('image')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
                        <input
                            type="text"
                            name="caption"
                            class="admin-input @error('caption') border-red-500 @enderror"
                            id="caption"
                            placeholder="Enter caption"
                            value="{{old('caption')}}"
                        />
                        @error('caption')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                        <input
                            type="number"
                            name="sort_order"
                            class="admin-input @error('sort_order') border-red-500 @enderror"
                            id="sort_order"
                            placeholder="0"
                            value="{{old('sort_order', 0)}}"
                        />
                        @error('sort_order')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-100 text-center">
                  <button class="admin-btn-success" type="submit">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
