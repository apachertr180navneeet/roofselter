@extends('backend.layout.app')
@section('title', 'Project Categories')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-7">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="text-base font-semibold text-gray-900">Projects Category Info</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="admin-table" id="basic-datatables">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Category Name</th>
                                <th scope="col" class="text-center">Published</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs_category as $blog)
                            <tr id="record-row-{{ $blog->id }}">
                                <td>{{ $loop->iteration }}</td>

                                <td class="text-center">{{ $blog->category_name ? $blog->category_name : '--' }}</td>

                                <td class="text-center">
                                    <label class="switch">
                                      <input type="checkbox" class="toggle-status" data-id="{{ $blog->id }}" data-url="{{ route('admin.blog-category-status') }}" {{ $blog->status == 1 ? 'checked' : '' }}>
                                      <span class="record-toggle"></span>
                                    </label>
                                </td>

                                <td class="text-center">
                                    <div class="form-button-action">

                                        <a href="{{route('admin.blog-category-edit',$blog->id)}}"
                                           class="admin-btn-secondary admin-btn-icon me-2">
                                           <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)"
                                           class="admin-btn-danger admin-btn-icon delete-record"
                                           data-id="{{ $blog->id }}"
                                           data-url="{{ route('admin.blog-category-destroy', $blog->id) }}">
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
        <div class="md:col-span-5">
            <div class="admin-card">
              <div class="admin-card-header">
                <h3 class="text-base font-semibold text-gray-900">Add Record for Projects Posts Category</h3>
              </div>
              <form action="{{route('admin.blog-category-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body">
                  <div class="grid grid-cols-1 gap-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <label for="cat_name" class="font-medium text-gray-700">Category Name</label>
                            <span class="text-danger">*</span>
                        </div>
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
                            <p class="text-xs text-gray-500 mt-1">This Category name your Projects Category Name.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="md:col-span-1">
                            <label for="slug" class="font-medium text-gray-700">Slug</label>
                            <span class="text-danger">*</span>
                        </div>
                        <div class="md:col-span-3">
                            <input
                                type="text"
                                class="admin-input"
                                name="slug"
                                id="slug"
                                placeholder="slug"
                            />
                            <p class="text-xs text-gray-500 mt-1">creating a slug from your category name.</p>
                        </div>
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

@section('script')
<script>
    function makeSlug(val) {
        let str = val;
        let output = str.replace(/\s+/g, '-').toLowerCase();
        $('#slug').val(output);
    }
</script>
@endsection
