@extends('admin.layout.app')
@section('title', 'Service Subcategories')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="lg:col-span-7">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="text-base font-semibold text-gray-900">Service Sub Category Info</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="admin-table" id="basic-datatables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-center">Sub Category Name</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Published</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service_subcategory as $service_subcat)
                            <tr id="record-row-{{ $service_subcat->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $service_subcat->subcategory_name ? $service_subcat->subcategory_name : '--' }}</td>
                                <td class="text-center">
                                    @if($service_subcat->category != null)
                                        {{ $service_subcat->category->category_name }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td class="text-center">
                                    <label class="switch">
                                      <input type="checkbox" class="toggle-status" data-id="{{ $service_subcat->id }}" data-url="{{ route('admin.service-subcategory-status') }}" {{ $service_subcat->status == 1 ? 'checked' : '' }}>
                                      <span class="record-toggle"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{route('admin.service-subcategory-edit',$service_subcat->id)}}"
                                           class="admin-btn-primary admin-btn-icon">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="admin-btn-danger admin-btn-icon delete-record"
                                           data-id="{{ $service_subcat->id }}"
                                           data-url="{{ route('admin.service-subcategory-destroy', $service_subcat->id) }}">
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
                <h3 class="text-base font-semibold text-gray-900">Add Record for Service Sub Category</h3>
              </div>
              <form action="{{route('admin.service-subcategory-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <label class="text-sm font-medium text-gray-700">Sub Category <br> Name <span class="text-red-500">*</span></label>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                name="subcategory_name"
                                onkeyup="makeSlug(this.value)"
                                class="admin-input @error('subcategory_name') border-red-500 @enderror"
                                id="subcat_name"
                                placeholder="Enter Sub Category"
                            />
                            @error('subcategory_name')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            <p id="cat_nameHelp2" class="text-xs text-gray-500 mt-1">This Sub Category name your Service Sub Category Name.</p>
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
                            <p id="slug" class="text-xs text-gray-500 mt-1">creating a slug from your sub category name.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <label class="text-sm font-medium text-gray-700">Select Category</label>
                        <div class="md:col-span-3">
                            <select name="category_id" id="category_id" class="admin-select select2" data-live-search="true">
                              <option>-- Select Category --</option>
                              @foreach($service_categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                              @endforeach
                            </select>
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
