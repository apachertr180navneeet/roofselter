@extends('backend.layout.app')
@section('title', 'Service Categories')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-7">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="text-base font-semibold text-gray-900">Service Category Info</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="admin-table" id="basic-datatables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Published</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service_category as $service_cat)
                            <tr id="record-row-{{ $service_cat->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $service_cat->category_name ? $service_cat->category_name : '--' }}</td>
                                <td class="text-center">
                                    <label class="switch">
                                      <input type="checkbox" class="toggle-status" data-id="{{ $service_cat->id }}" data-url="{{ route('admin.service-category-status') }}" {{ $service_cat->status == 1 ? 'checked' : '' }}>
                                      <span class="record-toggle"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{route('admin.service-category-edit',$service_cat->id)}}"
                                           class="admin-btn-primary admin-btn-icon">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="admin-btn-danger admin-btn-icon delete-record"
                                           data-id="{{ $service_cat->id }}"
                                           data-url="{{ route('admin.service-category-destroy', $service_cat->id) }}">
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
        <div class="lg:col-span-5">
            <div class="admin-card">
              <div class="admin-card-header">
                <h3 class="text-base font-semibold text-gray-900">Add Record for Service Category</h3>
              </div>
              <form action="{{route('admin.service-category-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <label class="text-sm font-medium text-gray-700">Category Name <span class="text-red-500">*</span></label>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                name="category_name"
                                onkeyup="makeSlug(this.value)"
                                class="admin-input @error('category_name') border-red-500 @enderror"
                                id="cat_name"
                                placeholder="Enter Category"
                            />
                            @error('category_name')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <p id="cat_nameHelp2" class="text-xs text-gray-500 mt-1">This Category name your Service Category Name.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <label class="text-sm font-medium text-gray-700">Slug <span class="text-red-500">*</span></label>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                class="admin-input"
                                name="slug"
                                id="slug"
                                placeholder="slug"
                            />
                            <p id="slug" class="text-xs text-gray-500 mt-1">creating a slug from your category name.</p>
                        </div>
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

@section('script')
<script>
    function makeSlug(val) {
        let str = val;
        let output = str.replace(/\s+/g, '-').toLowerCase();
        $('#slug').val(output);
    }
</script>
@endsection
