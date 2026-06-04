@extends('admin.layout.app')
@section('title', 'Before & After')
@section('content')
<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="card-title">All Images</div>
            <div class="card-tools">
                <button class="admin-btn-primary admin-btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i> Add New</button>
            </div>
        </div>
        <div class="admin-card-body">
            <table class="admin-table" id="basic-datatables">
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
                            <button class="admin-btn-secondary admin-btn-sm edit-btn" data-id="{{ $img->id }}" data-title="{{ $img->title }}" data-description="{{ $img->description }}" data-category="{{ $img->category }}" data-sort_order="{{ $img->sort_order }}" data-status="{{ $img->status }}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i></button>
                            <a href="{{ route('admin.before-after.destroy', $img->id) }}" class="admin-btn-danger admin-btn-sm" onclick="return confirm('Delete this image?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                            <input type="text" name="title" class="admin-input">
                        </div>
                        <div class="col-md-6">
                            <label>Category</label>
                            <input type="text" name="category" class="admin-input" placeholder="e.g. Roof Repair, Gutter">
                        </div>
                        <div class="col-md-6">
                            <label>Before Image <span class="text-red-500">*</span></label>
                            <input type="file" name="before_image" class="admin-input" accept="image/*" required>
                        </div>
                        <div class="col-md-6">
                            <label>After Image <span class="text-red-500">*</span></label>
                            <input type="file" name="after_image" class="admin-input" accept="image/*" required>
                        </div>
                        <div class="col-12">
                            <label>Description</label>
                            <textarea name="description" class="admin-textarea" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" class="admin-input" value="0">
                        </div>
                        <div class="col-md-6">
                            <div class="flex items-center gap-2 mt-4">
                                <input type="checkbox" name="status" id="addStatus" checked value="1">
                                <label for="addStatus">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="admin-btn-primary">Save</button>
                    <button type="button" class="admin-btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                            <input type="text" name="title" id="edit_title" class="admin-input">
                        </div>
                        <div class="col-md-6">
                            <label>Category</label>
                            <input type="text" name="category" id="edit_category" class="admin-input">
                        </div>
                        <div class="col-md-6">
                            <label>Before Image</label>
                            <input type="file" name="before_image" class="admin-input" accept="image/*">
                            <small class="text-gray-500">Leave empty to keep current</small>
                        </div>
                        <div class="col-md-6">
                            <label>After Image</label>
                            <input type="file" name="after_image" class="admin-input" accept="image/*">
                            <small class="text-gray-500">Leave empty to keep current</small>
                        </div>
                        <div class="col-12">
                            <label>Description</label>
                            <textarea name="description" id="edit_description" class="admin-textarea" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" id="edit_sort_order" class="admin-input">
                        </div>
                        <div class="col-md-6">
                            <div class="flex items-center gap-2 mt-4">
                                <input type="checkbox" name="status" id="edit_status" value="1">
                                <label for="edit_status">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="admin-btn-primary">Update</button>
                    <button type="button" class="admin-btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
