@extends('backend.layout.app')
@section('title', 'Appointments')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">All Appointments</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
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
                        <td class="font-medium text-gray-900">{{ $a->customer_name }}</td>
                        <td>{{ $a->contact_number }}</td>
                        <td>{{ $a->email }}</td>
                        <td>{{ $a->service_required }}</td>
                        <td>{{ \Carbon\Carbon::parse($a->preferred_date)->format('M d, Y') }}</td>
                        <td>{{ $a->preferred_time }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($a->additional_notes, 30) }}</td>
                        <td>
                            <span class="admin-badge 
                                @if($a->status == 0) admin-badge-warning
                                @elseif($a->status == 1) admin-badge-info
                                @elseif($a->status == 2) admin-badge-success
                                @else admin-badge-danger
                                @endif">
                                {{ $a->status_label }}
                            </span>
                        </td>
                        <td>
                            <div class="flex items-center gap-1">
                                <div class="relative inline-block dropdown">
                                    <button class="admin-btn-secondary admin-btn-sm" type="button" data-bs-toggle="dropdown">Change Status <i class="fas fa-chevron-down text-xs ml-1"></i></button>
                                    <ul class="dropdown-menu absolute right-0 mt-1 w-36 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10 hidden text-sm">
                                        <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-0').submit();">Pending</a></li>
                                        <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-1').submit();">Confirmed</a></li>
                                        <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-2').submit();">Completed</a></li>
                                        <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('status-form-{{ $a->id }}-3').submit();">Cancelled</a></li>
                                    </ul>
                                </div>
                                @foreach([0,1,2,3] as $s)
                                    <form id="status-form-{{ $a->id }}-{{ $s }}" action="{{ route('admin.appointment-status', $a->id) }}" method="POST" style="display:none;">@csrf<input type="hidden" name="status" value="{{ $s }}"></form>
                                @endforeach
                                <a href="javascript:void(0)" class="admin-btn-danger admin-btn-icon delete-record" data-id="{{ $a->id }}" data-url="{{ route('admin.appointment-destroy', $a->id) }}"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
