@extends('backend.layout.app')
@section('title', 'Projects')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Projects Info</h3>
            <a href="{{route('admin.blog-create')}}" class="admin-btn-primary"><i class="fa fa-plus"></i> Add Projects</a>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col" class="text-right">Title</th>
                        <th scope="col" class="text-right">Category</th>
                        <th scope="col" class="text-right">Published</th>
                        <th scope="col" class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr id="record-row-{{ $blog->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <p class="demo">
                            <div class="w-12 h-12 rounded-lg object-cover">
                                <img src="{{asset($blog->image ? 'img/'.$blog->image : '../assets/img/placeholder-image-3.jpg')}}" alt="{{ $blog->title }}" class="w-12 h-12 rounded-lg object-cover">
                            </div>
                            </p>
                        </td>
                        <th scope="row">
                            <button
                                class="admin-btn-primary admin-btn-icon admin-btn-sm me-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $blog->title ? $blog->title : '--' }}
                        </th>

                        <td class="text-right">
                            @if($blog->category != null)
                                {{ $blog->category->category_name }}
                            @else
                                --
                            @endif
                        </td>
                        <td class="text-right d-none">{{ $blog->short_description ? $blog->short_description : '--' }}</td>

                        <td class="text-right">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $blog->id }}" data-url="{{ route('admin.blog-status') }}" {{ $blog->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-right">
                            <div class="form-button-action">

                                <a href="{{route('admin.blog-edit',$blog->id)}}"
                                   class="admin-btn-primary admin-btn-icon me-3">
                                   <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $blog->id }}"
                                   data-url="{{ route('admin.blog-destroy', $blog->id) }}">
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
