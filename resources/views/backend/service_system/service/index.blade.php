@extends('backend.layout.app')
@section('title', 'Services')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Service Info</h3>
            <a href="{{route('admin.service-create')}}" class="admin-btn-primary admin-btn-sm"><i class="fa fa-plus-square"></i> Add Services</a>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th class="text-right">Title</th>
                        <th class="text-right">Short Desc</th>
                        <th class="text-right">Published</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr id="record-row-{{ $service->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="w-10 h-10">
                                <img src="{{asset($service->image ? 'img/'.$service->image : '../assets/img/placeholder-image-3.jpg')}}" alt="{{ $service->title }}" class="rounded object-cover w-full h-full">
                            </div>
                        </td>
                        <th scope="row">
                            <button class="inline-flex items-center justify-center p-1.5 rounded-lg bg-green-500 text-white me-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $service->title ? $service->title : '--' }}
                        </th>
                        <td class="text-right">{{ $service->short_description ? $service->short_description : '--' }}</td>
                        <td class="text-right">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $service->id }}" data-url="{{ route('admin.service-status') }}" {{ $service->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{route('admin.service-edit',$service->id)}}"
                                   class="admin-btn-primary admin-btn-icon">
                                   <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $service->id }}"
                                   data-url="{{ route('admin.service-destroy', $service->id) }}">
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
