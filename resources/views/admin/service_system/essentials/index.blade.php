@extends('admin.layout.app')
@section('title', 'Service Essentials')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Essentials Info</h3>
            <a href="{{route('admin.service-essentials-create')}}" class="admin-btn-primary ml-auto"><i class="fa fa-plus"></i> Add Essentials</a>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Service Name</th>
                        <th scope="col" class="text-center">Icon</th>
                        <th scope="col" class="text-center">Published</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($service_essentials as $essentials)
                    <tr id="record-row-{{ $essentials->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <button
                                class="admin-btn-success admin-btn-sm admin-btn-icon mr-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $essentials->title ? $essentials->title : '--' }}
                        </td>
                        <td class="text-center">
                            @if($essentials->service != null)
                                {{ $essentials->service->title }}
                            @else
                                --
                            @endif
                        </td>

                        <td class="text-center">
                            <i class="fa {{ $essentials->icon }} mr-2"></i>{{ $essentials->icon }}
                        </td>

                        <td class="text-center">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $essentials->id }}" data-url="{{ route('admin.service-essentials-status') }}" {{ $essentials->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-center">
                            <div class="form-button-action">

                                <a href="{{route('admin.service-essentials-edit',$essentials->id)}}"
                                   class="admin-btn-primary admin-btn-icon mr-3">
                                   <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $essentials->id }}"
                                   data-url="{{ route('admin.service-essentials-destroy', $essentials->id) }}">
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
