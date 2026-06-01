@extends('backend.layout.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header"><h3 class="fw-bold mb-3">Partner Applications</h3></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><div class="card-title">All Applications</div></div>
                    <div class="card-body">
                        <table class="table table-bordered" id="basic-datatables">
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
                                    <td><a href="{{ route('admin.become-partner.destroy', $p->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')"><i class="fa fa-trash"></i></a></td>
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
@endsection
