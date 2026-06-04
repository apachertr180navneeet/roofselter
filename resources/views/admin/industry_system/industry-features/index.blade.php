@extends('admin.layout.app')
@section('title', 'Industry Features')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">Industry Features Info</h3>
            <a href="{{route('admin.industry-features-create')}}" class="admin-btn-primary ml-auto"><i class="fa fa-plus"></i> Add Industry Features</a>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Industry Name</th>
                        <th scope="col" class="text-center">Icon</th>
                        <th scope="col" class="text-center">Published</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($industry_features as $industry)
                    <tr id="record-row-{{ $industry->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <button
                                class="admin-btn-success admin-btn-sm admin-btn-icon mr-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $industry->title ? $industry->title : '--' }}
                        </td>
                        <td class="text-center">
                            @if($industry->industry != null)
                                {{ $industry->industry->title }}
                            @else
                                --
                            @endif
                        </td>

                        <td class="text-center">
                            <i class="fa {{ $industry->icon }} mr-2"></i>{{ $industry->icon }}
                        </td>

                        <td class="text-center">
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $industry->id }}" data-url="{{ route('admin.industry-features-status') }}" {{ $industry->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td class="text-center">
                            <div class="form-button-action">

                                <a href="{{route('admin.industry-features-edit',$industry->id)}}"
                                   class="admin-btn-primary admin-btn-icon mr-3">
                                   <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)"
                                   class="admin-btn-danger admin-btn-icon delete-record"
                                   data-id="{{ $industry->id }}"
                                   data-url="{{ route('admin.industry-features-destroy', $industry->id) }}">
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
