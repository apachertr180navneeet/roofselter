@extends('admin.layout.app')
@section('title', 'Enquiries')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">All Enquiries</h3>
            <a href="{{ route('admin.enquiries.export') }}" class="admin-btn-success admin-btn-sm"><i class="fa fa-download"></i> Export CSV</a>
        </div>
        <div class="px-6 py-3 border-b border-gray-100">
            <form action="{{ route('admin.enquiries.search') }}" method="GET" class="flex flex-wrap items-center gap-2">
                @csrf
                <input type="text" name="search" class="admin-input w-64" placeholder="Search name, email, phone..." value="{{ request('search') }}">
                <select name="status" class="admin-select w-40">
                    <option value="">All Status</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                <button type="submit" class="admin-btn-primary admin-btn-sm"><i class="fa fa-search"></i> Search</button>
                <a href="{{ route('admin.enquiries') }}" class="admin-btn-secondary admin-btn-sm"><i class="fa fa-times"></i> Clear</a>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
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
                        <td class="font-medium text-gray-900">{{ $enquiry->username ?: '--' }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ $enquiry->phone }}</td>
                        <td>{{ $enquiry->service_required }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($enquiry->message, 30) }}</td>
                        <td>
                            @if($enquiry->is_read == 1)
                                <span class="admin-badge admin-badge-success">Read</span>
                            @else
                                <span class="admin-badge admin-badge-danger">Unread</span>
                            @endif
                        </td>
                        <td>
                            <span class="admin-badge @if($enquiry->enquiry_status == 'new') admin-badge-warning @elseif($enquiry->enquiry_status == 'in_progress') admin-badge-info @else admin-badge-success @endif">
                                {{ str_replace('_', ' ', ucfirst($enquiry->enquiry_status)) }}
                            </span>
                            <div class="relative inline-block dropdown">
                                <button class="ml-1 p-1 text-gray-400 hover:text-gray-600 rounded" type="button" data-bs-toggle="dropdown"><i class="fa fa-edit text-xs"></i></button>
                                <ul class="dropdown-menu absolute right-0 mt-1 w-36 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10 hidden text-sm">
                                    <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('enq-status-{{ $enquiry->id }}-new').submit();">New</a></li>
                                    <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('enq-status-{{ $enquiry->id }}-in_progress').submit();">In Progress</a></li>
                                    <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('enq-status-{{ $enquiry->id }}-closed').submit();">Closed</a></li>
                                </ul>
                            </div>
                            @foreach(['new', 'in_progress', 'closed'] as $st)
                                <form id="enq-status-{{ $enquiry->id }}-{{ $st }}" action="{{ route('admin.enquiries.status', $enquiry->id) }}" method="POST" style="display:none;">@csrf<input type="hidden" name="status" value="{{ $st }}"></form>
                            @endforeach
                        </td>
                        <td>{{ $enquiry->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="javascript:void(0)" class="admin-btn-danger admin-btn-icon delete-record" data-id="{{ $enquiry->id }}" data-url="{{ route('admin.enquiries-destroy', $enquiry->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
