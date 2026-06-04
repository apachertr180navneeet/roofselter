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
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Published</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($team_members as $team)
                    <tr id="record-row-{{ $team->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="w-10 h-10">
                                <img src="{{ $team->image && file_exists(public_path('img/'.$team->image)) ? asset('img/'.$team->image) : asset('panel-assets/assets/img/placeholder-image.svg') }}" alt="{{ $team->name }}" class="rounded object-cover w-full h-full">
                            </div>
                        </td>
                        <td>
                            <button class="inline-flex items-center justify-center p-1.5 rounded-lg bg-green-500 text-white me-2">
                                <i class="fa fa-check"></i>
                            </button>
                            {{ $team->name ? $team->name : '--' }}
                        </td>
                        <td>
                            {{ $team->designation ? $team->designation : '--' }}
                        </td>
                        <td>
                            <label class="switch">
                              <input type="checkbox" class="toggle-status" data-id="{{ $team->id }}" data-url="{{ route('admin.team_members-status') }}" {{ $team->status == 1 ? 'checked' : '' }}>
                              <span class="record-toggle"></span>
                            </label>
                        </td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a href="{{route('admin.team_members-edit',$team->id)}}"
                                   class="admin-btn-primary admin-btn-icon">
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

@endsection

