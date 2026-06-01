@extends('backend.layout.app')
@section('title', 'Quotes')
@section('content')

<div class="space-y-6">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="text-base font-semibold text-gray-900">All Quote Requests</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table" id="basic-datatables">
                <thead>
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
                        <td class="font-medium text-gray-900">{{ $q->name }}</td>
                        <td>{{ $q->phone }}</td>
                        <td>{{ $q->email }}</td>
                        <td>{{ $q->property_address }}</td>
                        <td>{{ $q->service_required }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($q->message, 30) }}</td>
                        <td>
                            <span class="admin-badge @if($q->status == 'new') admin-badge-warning @elseif($q->status == 'in_progress') admin-badge-info @else admin-badge-success @endif">
                                {{ str_replace('_', ' ', ucfirst($q->status)) }}
                            </span>
                        </td>
                        <td>{{ $q->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="flex items-center gap-1">
                                <div class="relative inline-block dropdown">
                                    <button class="admin-btn-secondary admin-btn-sm" type="button" data-bs-toggle="dropdown">Status <i class="fas fa-chevron-down text-xs ml-1"></i></button>
                                    <ul class="dropdown-menu absolute right-0 mt-1 w-36 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-10 hidden text-sm">
                                        <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('qstatus-{{ $q->id }}-new').submit();">New</a></li>
                                        <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('qstatus-{{ $q->id }}-in_progress').submit();">In Progress</a></li>
                                        <li><a class="block px-3 py-1.5 text-gray-700 hover:bg-gray-50" href="#" onclick="event.preventDefault(); document.getElementById('qstatus-{{ $q->id }}-closed').submit();">Closed</a></li>
                                    </ul>
                                </div>
                                @foreach(['new', 'in_progress', 'closed'] as $st)
                                                <form id="qstatus-{{ $q->id }}-{{ $st }}" action="{{ route('admin.quote-status', $q->id) }}" method="POST" style="display:none;">@csrf<input type="hidden" name="status" value="{{ $st }}"></form>
                                            @endforeach
                                            <a href="javascript:void(0)" class="admin-btn-danger admin-btn-icon delete-record" data-id="{{ $q->id }}" data-url="{{ route('admin.quote-destroy', $q->id) }}"><i class="fa fa-trash"></i></a>
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
