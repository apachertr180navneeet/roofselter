@extends('frontend.layout.app')
@section('meta_title', 'My Dashboard | ' . get_setting('website_name'))
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>My Dashboard</h2>
                <a href="{{ route('account.logout') }}" class="btn btn-outline-danger btn-sm">Logout</a>
            </div>
            <p class="text-muted">Welcome back, <strong>{{ $user->name }}</strong>!</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>My Appointments</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Service</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($appointments as $appt)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $appt->service_required }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appt->preferred_date)->format('d M Y') }}</td>
                                    <td>
                                        @if($appt->status == 0)
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($appt->status == 1)
                                            <span class="badge bg-info">Confirmed</span>
                                        @elseif($appt->status == 2)
                                            <span class="badge bg-success">Completed</span>
                                        @else
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No appointments yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-envelope me-2"></i>My Inquiries</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($inquiries as $inq)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $inq->service_required ?: 'General Inquiry' }}</td>
                                    <td>{{ $inq->created_at->format('d M Y') }}</td>
                                    <td>
                                        @if($inq->enquiry_status == 'closed')
                                            <span class="badge bg-success">Closed</span>
                                        @elseif($inq->enquiry_status == 'in_progress')
                                            <span class="badge bg-info">In Progress</span>
                                        @else
                                            <span class="badge bg-warning text-dark">New</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No inquiries yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 bg-light">
                <div class="card-body text-center py-4">
                    <p class="mb-2">Need help with your roof? <a href="{{ route('contact') }}" class="btn btn-primary btn-sm ms-2">Contact Us</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
