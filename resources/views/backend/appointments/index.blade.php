@extends('backend.layout.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Appointment Bookings</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">All Appointments</div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0" id="basic-datatables">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Service</th>
                                        <th>Preferred Date</th>
                                        <th>Time</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $key => $a)
                                    <tr id="record-row-{{ $a->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $a->customer_name }}</td>
                                        <td>{{ $a->contact_number }}</td>
                                        <td>{{ $a->email }}</td>
                                        <td>{{ $a->service_required }}</td>
                                        <td>{{ \Carbon\Carbon::parse($a->preferred_date)->format('M d, Y') }}</td>
                                        <td>{{ $a->preferred_time }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($a->additional_notes, 30) }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($a->status == 0) bg-warning text-dark
                                                @elseif($a->status == 1) bg-info
                                                @elseif($a->status == 2) bg-success
                                                @else bg-danger
                                                @endif">
                                                {{ $a->status_label }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Change Status</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-0').submit();">Pending</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-1').submit();">Confirmed</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-2').submit();">Completed</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-3').submit();">Cancelled</a></li>
                                                </ul>
                                            </div>
                                            @foreach([0,1,2,3] as $s)
                                                <form id="status-form-{{ $a->id }}-{{ $s }}" action="{{ route('admin.appointment-status', $a->id) }}" method="POST" style="display:none;">@csrf<input type="hidden" name="status" value="{{ $s }}"></form>
                                            @endforeach
                                            <a href="javascript:void(0)" class="btn btn-icon btn-round btn-danger btn-sm delete-record ms-1" data-id="{{ $a->id }}" data-url="{{ route('admin.appointment-destroy', $a->id) }}"><i class="fa fa-trash"></i></a>
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
