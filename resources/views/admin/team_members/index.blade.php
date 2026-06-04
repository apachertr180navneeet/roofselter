@extends('admin.layout.app')
@section('title', 'Team Members')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="card-title">Team Members Info</div>
            <a href="{{route('admin.team_members-create')}}" class="admin-btn-primary ml-auto"><i class="fa fa-plus"></i> Add Team Members</a>
        </div>
        <div class="overflow-x-auto">
            <div class="table-responsive">
                <table class="admin-table" id="basic-datatables">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="text-right">Name</th>
                            <th scope="col" class="text-right">Designation</th>
                            <th scope="col" class="text-right">Published</th>
                            <th scope="col" class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($team_members as $team)
                        <tr id="record-row-{{ $team->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <p class="demo">
                                <div class="avatar">
                                    <img src="{{asset($team->image ? 'img/'.$team->image : '../panel-assets/assets/img/placeholder-image-3.jpg')}}" alt="{{ $team->title }}" class="avatar-img rounded">
                                </div>
                                </p>
                            </td>
                            <th scope="row">
                                <button
                                    class="admin-btn-success admin-btn-icon admin-btn-sm mr-2">
                                    <i class="fa fa-check"></i>
                                </button>
                                {{ $team->name ? $team->name : '--' }}
                            </th>
                            <th scope="row">
                                {{ $team->designation ? $team->designation : '--' }}
                            </th>

                            <td class="text-right">
                                <label class="switch">
                                  <input type="checkbox" class="toggle-status" data-id="{{ $team->id }}" data-url="{{ route('admin.team_members-status') }}" {{ $team->status == 1 ? 'checked' : '' }}>
                                  <span class="record-toggle"></span>
                                </label>
                            </td>
                            <td class="text-right">
                                <div class="form-button-action">
                                    <a href="{{route('admin.team_members-edit',$team->id)}}"
                                       class="admin-btn-primary admin-btn-icon mr-3">
                                       <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="admin-btn-danger admin-btn-icon delete-record"
                                       data-id="{{ $team->id }}"
                                       data-url="{{ route('admin.team_members-destroy', $team->id) }}">
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

@endsection

