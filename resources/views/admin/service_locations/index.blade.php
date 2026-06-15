@extends('admin.layout.app')
@section('title', 'Service Locations')
@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <div class="md:col-span-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <div class="card-title">Service Locations</div>
                </div>
                <div class="overflow-x-auto">
                    <div class="table-responsive">
                        <table class="admin-table" id="basic-datatables">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col" class="text-center">Location Name</th>
                                    <th scope="col" class="text-center">Sort Order</th>
                                    <th scope="col" class="text-center">Active</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $loc)
                                <tr id="record-row-{{ $loc->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $loc->name }}</td>
                                    <td class="text-center">{{ $loc->sort_order }}</td>
                                    <td class="text-center">
                                        <label class="switch">
                                          <input type="checkbox" class="toggle-status" data-id="{{ $loc->id }}" data-url="{{ route('admin.service-locations-status') }}" {{ $loc->is_active == 1 ? 'checked' : '' }}>
                                          <span class="record-toggle"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-button-action">
                                            <a href="{{route('admin.service-locations-edit',$loc->id)}}"
                                               class="admin-btn-primary admin-btn-icon mr-2">
                                               <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                               class="admin-btn-danger admin-btn-icon delete-record"
                                               data-id="{{ $loc->id }}"
                                               data-url="{{ route('admin.service-locations-destroy', $loc->id) }}">
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
        </div>
        <div class="md:col-span-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <div class="card-title">{{ isset($location) ? 'Edit Location' : 'Add Location' }}</div>
                </div>
                <form action="{{ isset($location) ? route('admin.service-locations-update', $location->id) : route('admin.service-locations-store') }}" method="post">
                    @csrf
                    @if(isset($location)) @method('POST') @endif
                    <div class="admin-card-body">
                        <div class="mb-4">
                            <label for="name">Location Name</label>
                            <span class="text-red-500">*</span>
                            <input type="text" name="name" class="admin-input @error('name') border-red-500 @enderror" id="name" placeholder="Enter location name" value="{{ old('name', $location->name ?? '') }}" />
                            @error('name')<p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                        </div>
                        @if(isset($location))
                        <div class="mb-4">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_active" value="1" {{ $location->is_active ? 'checked' : '' }}>
                                <span class="text-sm">Active</span>
                            </label>
                        </div>
                        @endif
                    </div>
                    <div class="px-6 py-4 border-t border-gray-100 text-center flex gap-2 justify-center">
                        <button class="admin-btn-primary" type="submit">{{ isset($location) ? 'Update' : 'Submit' }}</button>
                        @if(isset($location))
                        <a href="{{ route('admin.service-locations') }}" class="admin-btn-danger">Cancel</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
