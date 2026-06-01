@extends('backend.layout.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Quote Requests</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">All Quote Requests</div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="basic-datatables">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Property Address</th>
                                        <th>Service Required</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotes as $key => $q)
                                    <tr id="record-row-{{ $q->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $q->name }}</td>
                                        <td>{{ $q->phone }}</td>
                                        <td>{{ $q->email }}</td>
                                        <td>{{ $q->property_address }}</td>
                                        <td>{{ $q->service_required }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($q->message, 30) }}</td>
                                        <td>
                                            <span class="badge @if($q->status == 'new') bg-warning text-dark @elseif($q->status == 'in_progress') bg-info @else bg-success @endif">
                                                {{ str_replace('_', ' ', ucfirst($q->status)) }}
                                            </span>
                                        </td>
                                        <td>{{ $q->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Status</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('qstatus-{{ $q->id }}-new').submit();">New</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('qstatus-{{ $q->id }}-in_progress').submit();">In Progress</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('qstatus-{{ $q->id }}-closed').submit();">Closed</a></li>
                                                </ul>
                                            </div>
                                            @foreach(['new', 'in_progress', 'closed'] as $st)
                                                <form id="qstatus-{{ $q->id }}-{{ $st }}" action="{{ route('admin.quote-status', $q->id) }}" method="POST" style="display:none;">@csrf<input type="hidden" name="status" value="{{ $st }}"></form>
                                            @endforeach
                                            <a href="javascript:void(0)" class="btn btn-icon btn-round btn-danger btn-sm delete-record ms-1" data-id="{{ $q->id }}" data-url="{{ route('admin.quote-destroy', $q->id) }}"><i class="fa fa-trash"></i></a>
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
@endsection
