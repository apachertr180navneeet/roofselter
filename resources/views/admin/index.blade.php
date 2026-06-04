@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

<div class="space-y-6">

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">{{ get_setting('website_name') }} Dashboard</h2>
            <p class="text-sm text-gray-500 mt-1">Real-time business insights and operations overview.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.appointments') }}" class="admin-btn-primary admin-btn-sm">
                <i class="fas fa-calendar-check"></i> View Appointments
            </a>
            <a href="{{ route('admin.quotes') }}" class="admin-btn-secondary admin-btn-sm">
                <i class="fas fa-file-invoice-dollar"></i> View Quote Requests
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="admin-card">
            <div class="admin-card-body flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-brand-100 flex items-center justify-center text-brand-600 text-2xl flex-shrink-0">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Inquiries</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_inquiries'] }}</h3>
                    @if($stats['new_inquiries'] > 0)
                    <span class="admin-badge admin-badge-danger mt-1">{{ $stats['new_inquiries'] }} New</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="admin-card">
            <div class="admin-card-body flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 text-2xl flex-shrink-0">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Appointments</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_appointments'] }}</h3>
                    @if($stats['pending_appointments'] > 0)
                    <span class="admin-badge admin-badge-warning mt-1">{{ $stats['pending_appointments'] }} Pending</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="admin-card">
            <div class="admin-card-body flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center text-green-600 text-2xl flex-shrink-0">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Quote Requests</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_quotes'] }}</h3>
                    @if($stats['new_quotes'] > 0)
                    <span class="admin-badge admin-badge-success mt-1">{{ $stats['new_quotes'] }} New</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="admin-card">
            <div class="admin-card-body flex items-center gap-4">
                <div class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center text-purple-600 text-2xl flex-shrink-0">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Projects Completed</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $stats['total_projects'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="rounded-xl p-6" style="background: linear-gradient(135deg, #1f283e 0%, #0f1523 100%);">
            <p class="text-gray-400 text-sm">Services Count</p>
            <h2 class="text-3xl font-bold text-yellow-400 mt-1">{{ $stats['total_services'] }}</h2>
            <p class="text-gray-500 text-sm mt-1">Active services offered on the website.</p>
        </div>
        <div class="rounded-xl p-6" style="background: linear-gradient(135deg, #2a3a5f 0%, #172445 100%);">
            <p class="text-gray-400 text-sm">Client Testimonials</p>
            <h2 class="text-3xl font-bold text-blue-400 mt-1">{{ $stats['total_testimonials'] }}</h2>
            <p class="text-gray-500 text-sm mt-1">Approved reviews shown on the landing page.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="text-base font-semibold text-gray-900">Recent Contact Inquiries</h3>
                <a href="{{ route('admin.enquiries') }}" class="admin-btn-primary admin-btn-sm">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_inquiries as $inquiry)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $inquiry->username }}</td>
                            <td>{{ $inquiry->phone }}</td>
                            <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($inquiry->is_read)
                                <span class="admin-badge admin-badge-success">Read</span>
                                @else
                                <span class="admin-badge admin-badge-danger">New</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-8 text-gray-400">No inquiries found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="text-base font-semibold text-gray-900">Recent Appointment Bookings</h3>
                <a href="{{ route('admin.appointments') }}" class="admin-btn-primary admin-btn-sm">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Preferred Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_appointments as $appt)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $appt->customer_name }}</td>
                            <td>{{ $appt->service_required }}</td>
                            <td>{{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}</td>
                            <td>
                                @if($appt->status == 0)
                                <span class="admin-badge admin-badge-warning">Pending</span>
                                @elseif($appt->status == 1)
                                <span class="admin-badge admin-badge-info">Confirmed</span>
                                @elseif($appt->status == 2)
                                <span class="admin-badge admin-badge-success">Completed</span>
                                @else
                                <span class="admin-badge admin-badge-danger">Cancelled</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-8 text-gray-400">No appointments booked yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
