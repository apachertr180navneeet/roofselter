@extends('backend.layout.app')
@section('title', 'Certifications')
@section('content')
<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <div class="card-title">All Certifications</div>
            <div class="card-tools">
                <button class="admin-btn-primary admin-btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa fa-plus"></i> Add New</button>
            </div>
        </div>
        <div class="admin-card-body">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Issuer</th>
                        <th>Issue Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($certifications as $key => $c)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><img src="{{ asset('img/'.$c->image) }}" width="60" height="60" style="object-fit:contain;"></td>
                        <td>{{ $c->title }}</td>
                        <td>{{ $c->issuer ?: '--' }}</td>
                        <td>{{ $c->issue_date ? \Carbon\Carbon::parse($c->issue_date)->format('d M Y') : '--' }}</td>
                        <td>
                            <input type="checkbox" class="toggle-status" data-id="{{ $c->id }}" data-url="{{ route('admin.certifications.status') }}" {{ $c->status ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                        </td>
                        <td>
                            <button class="admin-btn-secondary admin-btn-sm edit-btn" data-id="{{ $c->id }}" data-title="{{ $c->title }}" data-issuer="{{ $c->issuer }}" data-description="{{ $c->description }}" data-issue_date="{{ $c->issue_date ? \Carbon\Carbon::parse($c->issue_date)->format('Y-m-d') : '' }}" data-expiry_date="{{ $c->expiry_date ? \Carbon\Carbon::parse($c->expiry_date)->format('Y-m-d') : '' }}" data-sort_order="{{ $c->sort_order }}" data-status="{{ $c->status }}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i></button>
                            <a href="{{ route('admin.certifications.destroy', $c->id) }}" class="admin-btn-danger admin-btn-sm" onclick="return confirm('Delete?')"><i class="fa fa-trash"></i></a>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header"><h5 class="modal-title">Add Certification</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="mb-3"><label>Title <span class="text-red-500">*</span></label><input type="text" name="title" class="admin-input" required></div>
                    <div class="mb-3"><label>Issuer</label><input type="text" name="issuer" class="admin-input"></div>
                    <div class="mb-3"><label>Image <span class="text-red-500">*</span></label><input type="file" name="image" class="admin-input" accept="image/*" required></div>
                    <div class="row g-3">
                        <div class="col-md-6"><label>Issue Date</label><input type="date" name="issue_date" class="admin-input"></div>
                        <div class="col-md-6"><label>Expiry Date</label><input type="date" name="expiry_date" class="admin-input"></div>
                    </div>
                    <div class="mb-3 mt-3"><label>Description</label><textarea name="description" class="admin-textarea" rows="3"></textarea></div>
                    <div class="row g-3">
                        <div class="col-md-6"><label>Sort Order</label><input type="number" name="sort_order" class="admin-input" value="0"></div>
                        <div class="col-md-6"><div class="flex items-center gap-2 mt-4"><input type="checkbox" name="status" id="addStatus" checked value="1"><label for="addStatus">Active</label></div></div>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header"><h5 class="modal-title">Edit Certification</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="mb-3"><label>Title <span class="text-red-500">*</span></label><input type="text" name="title" id="edit_title" class="admin-input" required></div>
                    <div class="mb-3"><label>Issuer</label><input type="text" name="issuer" id="edit_issuer" class="admin-input"></div>
                    <div class="mb-3"><label>Image</label><input type="file" name="image" class="admin-input" accept="image/*"><small class="text-gray-500">Leave empty to keep current</small></div>
                    <div class="row g-3">
                        <div class="col-md-6"><label>Issue Date</label><input type="date" name="issue_date" id="edit_issue_date" class="admin-input"></div>
                        <div class="col-md-6"><label>Expiry Date</label><input type="date" name="expiry_date" id="edit_expiry_date" class="admin-input"></div>
                    </div>
                    <div class="mb-3 mt-3"><label>Description</label><textarea name="description" id="edit_description" class="admin-textarea" rows="3"></textarea></div>
                    <div class="row g-3">
                        <div class="col-md-6"><label>Sort Order</label><input type="number" name="sort_order" id="edit_sort_order" class="admin-input"></div>
                        <div class="col-md-6"><div class="flex items-center gap-2 mt-4"><input type="checkbox" name="status" class="form-check-input" id="edit_status" value="1"><label for="edit_status">Active</label></div></div>
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
        $('#editForm').attr('action', '/admin/certifications/' + $(this).data('id') + '/update');
        $('#edit_title').val($(this).data('title'));
        $('#edit_issuer').val($(this).data('issuer'));
        $('#edit_description').val($(this).data('description'));
        $('#edit_issue_date').val($(this).data('issue_date'));
        $('#edit_expiry_date').val($(this).data('expiry_date'));
        $('#edit_sort_order').val($(this).data('sort_order'));
        $('#edit_status').prop('checked', $(this).data('status') == 1);
    });
    $('.toggle-status').on('change', function() {
        $.post($(this).data('url'), { id: $(this).data('id'), _token: '{{ csrf_token() }}' });
    });
</script>
@endsection
