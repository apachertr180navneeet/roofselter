@extends('admin.layout.app')
@section('title', 'Become Partner')
@section('content')
<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header"><div class="card-title">All Applications</div></div>
        <div class="admin-card-body">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Designation</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Website</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $key => $p)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $p->fullname }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->phone }}</td>
                        <td>{{ $p->designation ?: '--' }}</td>
                        <td>{{ $p->state ?: '--' }}</td>
                        <td>{{ $p->city ?: '--' }}</td>
                        <td>{{ $p->website ?: '--' }}</td>
                        <td>{{ $p->created_at->format('d M Y') }}</td>
                        <td><a href="{{ route('admin.become-partner.destroy', $p->id) }}" class="admin-btn-danger admin-btn-sm" onclick="return confirm('Delete?')"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
