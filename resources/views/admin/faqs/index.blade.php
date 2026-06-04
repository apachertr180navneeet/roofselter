@extends('admin.layout.app')
@section('title', 'FAQs')
@section('content')

<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="text-base font-semibold text-gray-900">FAQs</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="admin-table" id="basic-datatables">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Question</th>
                                <th scope="col" class="text-center">Published</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $faq)
                            <tr id="record-row-{{ $faq->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faq->question }}</td>
                                <td class="text-center">
                                    <label class="switch">
                                      <input type="checkbox" class="toggle-status" data-id="{{ $faq->id }}" data-url="{{ route('admin.faqs-status') }}" {{ $faq->status == 1 ? 'checked' : '' }}>
                                      <span class="record-toggle"></span>
                                    </label>
                                </td>
                                <td class="text-center">
                                    <div class="form-button-action">
                                        <a href="{{route('admin.faqs-edit',$faq->id)}}"
                                           class="admin-btn-secondary admin-btn-icon me-2">
                                           <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="admin-btn-danger admin-btn-icon delete-record"
                                           data-id="{{ $faq->id }}"
                                           data-url="{{ route('admin.faqs-destroy', $faq->id) }}">
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
                <h3 class="text-base font-semibold text-gray-900">Add FAQ</h3>
              </div>
              <form action="{{route('admin.faqs-store')}}" method="post">
                @csrf
                <div class="admin-card-body">
                  <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="question" class="font-medium text-gray-700">Question</label>
                        <span class="text-danger">*</span>
                        <input
                            type="text"
                            name="question"
                            class="admin-input @error('question') border-red-500 @enderror"
                            id="question"
                            placeholder="Enter Question"
                            value="{{old('question')}}"
                        />
                        @error('question')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="answer" class="font-medium text-gray-700">Answer</label>
                        <span class="text-danger">*</span>
                        <textarea
                            name="answer"
                            class="admin-textarea @error('answer') border-red-500 @enderror"
                            id="answer"
                            rows="4"
                            placeholder="Enter Answer">{{old('answer')}}</textarea>
                        @error('answer')
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
