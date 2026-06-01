@extends('backend.layout.app')
@section('title', 'Before & After')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Before & After Images</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">All Images</div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i> Add New</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="basic-datatables">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Before</th>
                                    <th>After</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($images as $key => $img)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $img->title ?: '--' }}</td>
                                    <td><img src="{{ asset('img/'.$img->before_image) }}" width="80" height="60" style="object-fit:cover;"></td>
                                    <td><img src="{{ asset('img/'.$img->after_image) }}" width="80" height="60" style="object-fit:cover;"></td>
                                    <td>{{ $img->category ?: '--' }}</td>
                                    <td>
                                        <input type="checkbox" class="toggle-status" data-id="{{ $img->id }}" data-url="{{ route('admin.before-after.status') }}" {{ $img->status ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                    </td>
                                    <td>{{ $img->sort_order }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $img->id }}" data-title="{{ $img->title }}" data-description="{{ $img->description }}" data-category="{{ $img->category }}" data-sort_order="{{ $img->sort_order }}" data-status="{{ $img->status }}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i></button>
                                        <a href="{{ route('admin.before-after.destroy', $img->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Delete this image?')"><i class="fa fa-trash"></i></a>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.before-after.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header"><h5 class="modal-title">Add Before/After Image</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" placeholder="e.g. Roof Repair, Gutter">
                        </div>
                        <div class="col-md-6">
                            <label>Before Image <span class="text-danger">*</span></label>
                            <input type="file" name="before_image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="col-md-6">
                            <label>After Image <span class="text-danger">*</span></label>
                            <input type="file" name="after_image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="col-12">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="status" class="form-check-input" id="addStatus" checked value="1">
                                <label class="form-check-label" for="addStatus">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header"><h5 class="modal-title">Edit Before/After Image</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Category</label>
                            <input type="text" name="category" id="edit_category" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Before Image</label>
                            <input type="file" name="before_image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave empty to keep current</small>
                        </div>
                        <div class="col-md-6">
                            <label>After Image</label>
                            <input type="file" name="after_image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave empty to keep current</small>
                        </div>
                        <div class="col-12">
                            <label>Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" id="edit_sort_order" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="status" class="form-check-input" id="edit_status" value="1">
                                <label class="form-check-label" for="edit_status">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.edit-btn').on('click', function() {
        var id = $(this).data('id');
        $('#editForm').attr('action', '/admin/before-after/' + id + '/update');
        $('#edit_title').val($(this).data('title'));
        $('#edit_description').val($(this).data('description'));
        $('#edit_category').val($(this).data('category'));
        $('#edit_sort_order').val($(this).data('sort_order'));
        $('#edit_status').prop('checked', $(this).data('status') == 1);
    });
    $('.toggle-status').on('change', function() {
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.post(url, { id: id, _token: '{{ csrf_token() }}' });
    });
</script>
@endsection
