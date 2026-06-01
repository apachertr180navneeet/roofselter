@extends('backend.layout.app')
@section('title', 'Enquiries')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Enquiry Management</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">All Enquiries</div>
                            <div class="card-tools">
                                <a href="{{ route('admin.enquiries.export') }}" class="btn btn-success btn-round btn-sm me-2"><i class="fa fa-download"></i> Export CSV</a>
                            </div>
                        </div>
                        <div class="card-head-row mt-2">
                            <form action="{{ route('admin.enquiries.search') }}" method="GET" class="row g-2 align-items-center">
                                @csrf
                                <div class="col-auto">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search name, email, phone..." value="{{ request('search') }}">
                                </div>
                                <div class="col-auto">
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="">All Status</option>
                                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Search</button>
                                    <a href="{{ route('admin.enquiries') }}" class="btn btn-sm btn-secondary"><i class="fa fa-times"></i> Clear</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="basic-datatables">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Service Required</th>
                                        <th>Message</th>
                                        <th>Read</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($enquiries as $key => $enquiry)
                                    <tr id="record-row-{{ $enquiry->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <th scope="row">{{ $enquiry->username ?: '--' }}</th>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>{{ $enquiry->phone }}</td>
                                        <td>{{ $enquiry->service_required }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($enquiry->message, 30) }}</td>
                                        <td>
                                            @if($enquiry->is_read == 1)
                                                <span class="badge badge-success">Read</span>
                                            @else
                                                <span class="badge badge-danger">Unread</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge @if($enquiry->enquiry_status == 'new') bg-warning text-dark @elseif($enquiry->enquiry_status == 'in_progress') bg-info @else bg-success @endif">
                                                {{ str_replace('_', ' ', ucfirst($enquiry->enquiry_status)) }}
                                            </span>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"><i class="fa fa-edit"></i></button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('enq-status-{{ $enquiry->id }}-new').submit();">New</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('enq-status-{{ $enquiry->id }}-in_progress').submit();">In Progress</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('enq-status-{{ $enquiry->id }}-closed').submit();">Closed</a></li>
                                                </ul>
                                            </div>
                                            @foreach(['new', 'in_progress', 'closed'] as $st)
                                                <form id="enq-status-{{ $enquiry->id }}-{{ $st }}" action="{{ route('admin.enquiries.status', $enquiry->id) }}" method="POST" style="display:none;">@csrf<input type="hidden" name="status" value="{{ $st }}"></form>
                                            @endforeach
                                        </td>
                                        <td>{{ $enquiry->created_at->format('M d, Y') }}</td>
                                        <td class="text-end">
                                            <div class="form-button-action">
                                                <a href="javascript:void(0)" class="btn btn-icon btn-round btn-danger btn-lg delete-record" data-id="{{ $enquiry->id }}" data-url="{{ route('admin.enquiries-destroy', $enquiry->id) }}"><i class="fa fa-trash"></i></a>
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
@endsection
