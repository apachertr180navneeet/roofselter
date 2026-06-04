@extends('admin.layout.app')
@section('title', 'About Categories')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-7">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="text-base font-semibold text-gray-900">About Us Category Info</h3>
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
                            @foreach($about_category as $about)
                            <tr id="record-row-{{ $about->id }}">
                                <td>{{ $loop->iteration }}</td>
                                

                                <td class="text-center">{{ $about->category_name ? $about->category_name : '--' }}</td>
                                
                                <td class="text-center">
                                    <label class="switch">
                                      <input type="checkbox" class="toggle-status" data-id="{{ $about->id }}" data-url="{{ route('admin.about-category-status') }}" {{ $about->status == 1 ? 'checked' : '' }}>
                                      <span class="record-toggle"></span>
                                    </label>
                                </td>

                                <td class="text-center">
                                    <div class="form-button-action">

                                        <a href="{{route('admin.about-category-edit',$about->id)}}"
                                           class="admin-btn-primary admin-btn-icon mr-2">
                                           <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)"
                                           class="admin-btn-danger admin-btn-icon delete-record"
                                           data-id="{{ $about->id }}"
                                           data-url="{{ route('admin.about-category-destroy', $about->id) }}">
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
                <h3 class="text-base font-semibold text-gray-900">Add Record for About Us Category</h3>
              </div>
              <form action="{{route('admin.about-category-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body">
                  <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <div class="md:col-span-12">
                      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                          <div>
                              <label for="cat_name">Category Name</label>
                              <span class="text-red-500">*</span>
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
                              <small id="cat_nameHelp2" class="text-xs text-gray-500"
                                      >This Category name your About Category Name.
                              </small>

                          </div>
                      </div>
                      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                          <div>
                              <label for="slug">Slug</label>
                              <span class="text-red-500">*</span>
                          </div>
                          <div class="md:col-span-3">
                              <input
                                  type="text"
                                  class="admin-input"
                                  name="slug"
                                  id="slug"
                                  placeholder="slug"
                                  
                              />
                              <small id="slug" class="text-xs text-gray-500"
                                      >creating a slug from your category name.
                              </small>
                          </div>
                      </div>

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




@section('script')
<script>
    function makeSlug(val) {
        let str = val;
        let output = str.replace(/\s+/g, '-').toLowerCase();
        $('#slug').val(output);
    }
</script>
@endsection
