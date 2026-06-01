@extends('backend.layout.app')
@section('title', 'Why Choose Us')
@section('content')
<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="card-title">Manage Items</div>
            <button class="admin-btn-primary ml-auto" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus-square"></i> Add Item</button>
        </div>
        <div class="overflow-x-auto">
            <div class="table-responsive">
                <table class="admin-table" id="basic-datatables">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Sort Order</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $key => $item)
                        <tr id="record-row-{{ $item->id }}">
                            <td>{{ $key+1 }}</td>
                            <td><i class="{{ $item->icon }} fs-4"></i></td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->sort_order }}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="toggle-status" data-id="{{ $item->id }}" data-url="{{ route('admin.why-choose-us-status') }}" {{ $item->status == 1 ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <div class="form-button-action">
                                    <a href="{{ route('admin.why-choose-us-edit', $item->id) }}" class="admin-btn-primary admin-btn-icon"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="admin-btn-danger admin-btn-icon delete-record" data-id="{{ $item->id }}" data-url="{{ route('admin.why-choose-us-destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.why-choose-us-store') }}" method="POST">
                @csrf
                <div class="modal-header"><h5 class="modal-title">Add Item</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" class="admin-input" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="admin-textarea" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Icon Class</label>
                        <input type="text" name="icon" class="admin-input" placeholder="e.g., fa fa-check">
                    </div>
                    <div class="mb-3">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="admin-input" value="0">
                    </div>
                    <div class="mb-3">
                        <label><input type="checkbox" name="status" value="1" checked> Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="admin-btn-primary">Save</button>
                    <button type="button" class="admin-btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
