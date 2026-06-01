@extends('backend.layout.app')
@section('title', 'Why Choose Us')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Why Choose Us</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Manage Items</div>
                            <button class="btn btn-dark ms-auto" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus-square"></i> Add Item</button>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="basic-datatables">
                                <thead class="thead-light">
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
                                                <a href="{{ route('admin.why-choose-us-edit', $item->id) }}" class="btn btn-icon btn-round btn-info btn-lg"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-icon btn-round btn-danger btn-lg delete-record" data-id="{{ $item->id }}" data-url="{{ route('admin.why-choose-us-destroy', $item->id) }}"><i class="fa fa-trash"></i></a>
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
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="e.g., fa fa-check">
                    </div>
                    <div class="mb-3">
                        <label>Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="0">
                    </div>
                    <div class="mb-3">
                        <label><input type="checkbox" name="status" value="1" checked> Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
