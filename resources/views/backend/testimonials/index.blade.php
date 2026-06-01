@extends('backend.layout.app')
@section('title', 'Testimonials')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Testimonial Info</h3>
            <a href="{{route('admin.testimonial-create')}}" class="admin-btn-primary"><i class="fa fa-plus"></i> Add Testimonial</a>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col" class="text-right">Name</th>
                        <th scope="col" class="text-right">Designation</th>
                        <th scope="col" class="text-center">Rating</th>
                        <th scope="col" class="text-right">Published</th>
                        <th scope="col" class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                    <tr id="record-row-{{ $testimonial->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <p class="demo">
                            <div class="w-12 h-12 rounded-lg object-cover">
                                <img src="{{asset($testimonial->image ? 'img/'.$testimonial->image : '../assets/img/placeholder-image-3.jpg')}}" alt="{{ $testimonial->title }}" class="w-12 h-12 rounded-lg object-cover">
                            </div>
                            </p>
                        </td>
                        <th scope="row">
                            <button
                                class="admin-btn-primary admin-btn-icon admin-btn-sm me-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $testimonial->name ? $testimonial->name : '--' }}
                        </th>
                        <th scope="row">
                            {{ $testimonial->designation ? $testimonial->designation : '--' }}
                        </th>
                        <td class="text-center">
                            <div class="star-display" data-rating="{{ $testimonial->rating }}"></div>
                        </td>

                        <td class="text-right">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $testimonial->id }}" data-url="{{ route('admin.testimonial-status') }}" {{ $testimonial->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-right">
                            <div class="form-button-action">

                                <a href="{{route('admin.testimonial-edit',$testimonial->id)}}"
                                   class="admin-btn-primary admin-btn-icon me-3">
                                   <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $testimonial->id }}"
                                   data-url="{{ route('admin.testimonial-destroy', $testimonial->id) }}">
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

@endsection
