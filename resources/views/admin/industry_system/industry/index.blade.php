@extends('admin.layout.app')
@section('title', 'Industries')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Industry Info</h3>
            <a href="{{route('admin.industry-create')}}" class="admin-btn-primary ml-auto"><i class="fa fa-plus-square"></i> Add Industry</a>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Short Desc</th>
                        <th scope="col">Published</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($industries as $industry)
                    <tr id="record-row-{{ $industry->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="avatar">
                                <img src="{{asset($industry->image ? 'img/'.$industry->image : 'panel-assets/assets/img/placeholder-image.svg')}}" alt="{{ $industry->title }}" class="avatar-img rounded">
                            </div>
                        </td>
                        <td>
                            <button
                                class="admin-btn-success admin-btn-sm admin-btn-icon mr-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $industry->title ? $industry->title : '--' }}
                        </td>

                        
                        <td class="text-right">{{ $industry->short_description ? $industry->short_description : '--' }}</td>

                        <td class="text-right">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $industry->id }}" data-url="{{ route('admin.industry-status') }}" {{ $industry->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-right">
                            <div class="form-button-action">
                                <a href="{{route('admin.industry-edit',$industry->id)}}"
                                   class="admin-btn-primary admin-btn-icon mr-3">
                                   <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $industry->id }}"
                                   data-url="{{ route('admin.industry-destroy', $industry->id) }}">
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

