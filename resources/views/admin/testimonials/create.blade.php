@extends('admin.layout.app')
@section('title', 'Create Testimonial')
@section('content')
        <div class="space-y-6">
          <div class="max-w-4xl mx-auto">
            <div class="admin-card">
              <div class="admin-card-header">
                <h3 class="text-base font-semibold text-gray-900">Add Testimonial Record</h3>
              </div>
              <form action="{{route('admin.testimonial-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="admin-card-body">
                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                      <div class="md:col-span-1">
                          <label for="name" class="font-medium text-gray-700">Name</label>
                          <span class="text-danger">*</span>
                      </div>
                      <div class="md:col-span-3">
                          <input
                              type="text"
                              name="name"
                              class="admin-input @error('name') border-red-500 @enderror"
                              id="name"
                              placeholder="Enter Name"
                          />
                          @error('name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                          <p class="text-xs text-gray-500 mt-1">This name your Testimonial Person.</p>
                      </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                      <div class="md:col-span-1">
                          <label for="designation" class="font-medium text-gray-700">Designation</label>
                      </div>
                      <div class="md:col-span-3">
                          <input
                              type="text"
                              name="designation"
                              class="admin-input"
                              id="designation"
                              placeholder="Enter Designation"
                          />
                          <p class="text-xs text-gray-500 mt-1">This designation your Testimonial Person.</p>
                      </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                      <div class="md:col-span-1">
                          <label for="rating" class="font-medium text-gray-700">Rating</label>
                      </div>
                      <div class="md:col-span-3">
                        <div id="rateYo" class="mb-3"></div>
                          <input
                              type="hidden"
                              name="rating"
                              id="rating"
                              placeholder="Enter Rating"
                          />
                          <p id="rating-message" style="font-weight:bold; color:#f39c12;"></p>
                      </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                      <div class="md:col-span-1">
                          <label for="image" class="font-medium text-gray-700">Image</label>
                      </div>
                      <div class="md:col-span-3">
                          <x-file-upload name="image" label="Upload Image" />
                          <p class="text-xs text-gray-500 mt-1">This Image is Testimonial Clients Image.</p>
                      </div>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
                      <div class="md:col-span-1">
                          <label for="message" class="font-medium text-gray-700">Message</label>
                      </div>
                      <div class="md:col-span-3">
                          <textarea id="myeditor" name="message"></textarea>
                      </div>
                  </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-100 text-center">
                  <button class="admin-btn-success" type="submit">Submit</button>
                  <a href="{{route('admin.testimonial')}}" class="admin-btn-danger">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>

@endsection
