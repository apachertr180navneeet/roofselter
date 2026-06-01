@extends('backend.layout.app')
@section('title', 'Edit Industry')
@section('content')
<div class="space-y-6">
    <form action="{{route('admin.industry-update',$industry->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-7">
          <div class="admin-card">
            <div class="admin-card-header">
              <h3 class="text-base font-semibold text-gray-900">Update Industry Record</h3>
            </div>

            <input type="hidden" name="id" value="id">
            <div class="admin-card-body">
              <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="md:col-span-12">
                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                      <label for="title">Title</label>
                      <span class="text-red-500">*</span>
                    </div>
                    <div class="md:col-span-3">
                      <input
                        type="text"
                        class="admin-input @error('title') border-red-500 @enderror"
                        id="title"
                        name="title"
                        onkeyup="makeSlug(this.value)"
                        value="{{old('title',$industry->title)}}"
                        placeholder="Enter Title" />
                      @error('title')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                      <small id="titleHelp2" class="text-xs text-gray-500">This title your industry heading.
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
                        id="slug"
                        name="slug"
                        value="{{$industry->slug}}"
                        placeholder="slug" />

                      <small id="slug" class="text-xs text-gray-500">create a slug from your title.
                      </small>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                      <label for="subtitle">Sub Title</label>
                    </div>
                    <div class="md:col-span-3">
                      <input
                        type="text"
                        name="subtitle"
                        class="admin-input"
                        value="{{ $industry->subtitle }}"
                        id="subtitle"
                        placeholder="Enter Sub Title" />

                      <small id="subtitle" class="text-xs text-gray-500">This sub title for your industry details page heading.
                      </small>

                    </div>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                      <label for="subtitle2">Sub Title II</label>
                    </div>
                    <div class="md:col-span-3">
                      <input
                        type="text"
                        name="subtitle2"
                        class="admin-input"
                        value="{{ $industry->subtitle2 }}"
                        id="subtitle2"
                        placeholder="Enter Sub Title II" />

                      <small id="subtitle2" class="text-xs text-gray-500">This sub title II for your industry details page heading.
                      </small>

                    </div>
                  </div>


                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                      <label for="image">Image</label>
                    </div>
                    <div class="md:col-span-3">
                      <x-file-upload name="image" label="Upload Image" :current="$industry->image" />
                      <small id="image" class="text-xs text-gray-500">This Image show in your Industry Image section.
                      </small>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                      <label for="short_descripition">Short Description</label>
                    </div>
                    <div class="md:col-span-3">
                      <textarea id="short_description" class="admin-textarea" row="4" name="short_description">{{ $industry->short_description }}</textarea>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                      <label for="descripition">Description</label>
                    </div>
                    <div class="md:col-span-3">
                      <textarea id="myeditor" name="description">{{ $industry->description }}</textarea>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="md:col-span-5">
          <div class="admin-card">
            <div class="admin-card-header">
              <h3 class="text-base font-semibold text-gray-900">Update Industry Features Headings and Short Description for Your Industry Details Page</h3>
            </div>

            <div class="admin-card-body">
              <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="md:col-span-12">

                  <div class="grid grid-cols-1 gap-4">
                    <div>
                      <label for="features_headings">Industry Features Headings</label>

                      <input
                        type="text"
                        name="features_headings"
                        class="admin-input"
                        id="features_headings"
                        value="{{$industry->features_headings}}"
                        placeholder="Enter Industry Features Headings" />

                      <small id="features_headings" class="text-xs text-gray-500">This features headings for your industry details page heading.
                      </small>

                    </div>
                  </div>




                  <div class="grid grid-cols-1 gap-4">
                    <div>
                      <label for="features_short_descripition">Industry Features Short Description</label>

                      <textarea id="features_short_description" class="admin-textarea" row="4" name="features_short_description">{{$industry->features_short_description}}</textarea>
                    </div>
                  </div>


                </div>
              </div>
            </div>

          </div>

          <div class="admin-card">
            <div class="admin-card-header">
              <h3 class="text-base font-semibold text-gray-900">Update Industry Service Headings and Short Description for Your Industry Details Page</h3>
            </div>

            <div class="admin-card-body">
              <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                <div class="md:col-span-12">

                  <div class="grid grid-cols-1 gap-4">
                    <div>
                      <label for="service_headings">Industry Service Headings</label>

                      <input
                        type="text"
                        name="service_headings"
                        class="admin-input"
                        id="service_headings"
                        value="{{$industry->service_headings}}"
                        placeholder="Enter Industry Service Headings" />

                      <small id="service_headings" class="text-xs text-gray-500">This service headings for your industry details page heading.
                      </small>

                    </div>
                  </div>




                  <div class="grid grid-cols-1 gap-4">
                    <div>
                      <label for="service_short_descripition">Industry Service Short Description</label>

                      <textarea id="service_short_description" class="admin-textarea" row="4" name="service_short_description">{{$industry->service_short_description}}</textarea>
                    </div>
                  </div>


                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="admin-card">
        <div class="px-6 py-4 border-t border-gray-100 text-center">
          <button class="admin-btn-primary" type="submit">Submit</button>
          <a href="{{route('admin.industry')}}" class="admin-btn-danger">Cancel</a>
        </div>
      </div>
    </form>
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
