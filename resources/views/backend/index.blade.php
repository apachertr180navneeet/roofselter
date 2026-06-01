@extends('backend.layout.app')
@section('content')

    <div class="container">
      <div class="page-inner">
        <div
          class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
        >
          <div>
            <h3 class="fw-bold mb-3">{{ get_setting('website_name') }} Dashboard</h3>
            <h6 class="op-7 mb-2">Real-time business insights and operations overview.</h6>
          </div>
          <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route('admin.appointments') }}" class="btn btn-primary btn-round">View Appointments</a>
            <a href="{{ route('admin.quotes') }}" class="btn btn-label-info btn-round ms-2">View Quote Requests</a>
          </div>
        </div>
        
        <!-- Top Stats Row -->
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-icon">
                    <div
                      class="icon-big text-center icon-primary bubble-shadow-small"
                    >
                      <i class="fas fa-envelope"></i>
                    </div>
                  </div>
                  <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                      <p class="card-category">Total Inquiries</p>
                      <h4 class="card-title">{{ $stats['total_inquiries'] }}</h4>
                      @if($stats['new_inquiries'] > 0)
                        <span class="badge bg-danger">{{ $stats['new_inquiries'] }} New</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-icon">
                    <div
                      class="icon-big text-center icon-info bubble-shadow-small"
                    >
                      <i class="fas fa-calendar-check"></i>
                    </div>
                  </div>
                  <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                      <p class="card-category">Appointments</p>
                      <h4 class="card-title">{{ $stats['total_appointments'] }}</h4>
                      @if($stats['pending_appointments'] > 0)
                        <span class="badge bg-warning text-dark">{{ $stats['pending_appointments'] }} Pending</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-icon">
                    <div
                      class="icon-big text-center icon-success bubble-shadow-small"
                    >
                      <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                  </div>
                  <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                      <p class="card-category">Quote Requests</p>
                      <h4 class="card-title">{{ $stats['total_quotes'] }}</h4>
                      @if($stats['new_quotes'] > 0)
                        <span class="badge bg-success">{{ $stats['new_quotes'] }} New</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-icon">
                    <div
                      class="icon-big text-center icon-secondary bubble-shadow-small"
                    >
                      <i class="fas fa-briefcase"></i>
                    </div>
                  </div>
                  <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                      <p class="card-category">Projects Completed</p>
                      <h4 class="card-title">{{ $stats['total_projects'] }}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Additional Stats Row -->
        <div class="row mt-3">
          <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round p-3" style="background: linear-gradient(135deg, #1f283e 0%, #0f1523 100%); color: #fff;">
              <div class="card-body">
                <h5 class="text-white op-8">Services Count</h5>
                <h2 class="text-warning fw-bold">{{ $stats['total_services'] }}</h2>
                <p class="m-0 text-white-50">Active services offered on the website.</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round p-3" style="background: linear-gradient(135deg, #2a3a5f 0%, #172445 100%); color: #fff;">
              <div class="card-body">
                <h5 class="text-white op-8">Client Testimonials</h5>
                <h2 class="text-info fw-bold">{{ $stats['total_testimonials'] }}</h2>
                <p class="m-0 text-white-50">Approved reviews shown on the landing page.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Tables Row -->
        <div class="row mt-4">
          <!-- Recent Inquiries -->
          <div class="col-md-6">
            <div class="card card-round">
              <div class="card-header">
                <div class="card-head-row">
                  <div class="card-title">Recent Contact Inquiries</div>
                  <div class="card-tools">
                    <a href="{{ route('admin.enquiries') }}" class="btn btn-label-primary btn-round btn-sm">View All</a>
                  </div>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                    <thead class="thead-light">
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
                        <td>{{ $inquiry->username }}</td>
                        <td>{{ $inquiry->phone }}</td>
                        <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                        <td>
                          @if($inquiry->is_read)
                            <span class="badge bg-success">Read</span>
                          @else
                            <span class="badge bg-danger">New</span>
                          @endif
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="4" class="text-center py-4 text-muted">No inquiries found.</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Recent Appointments -->
          <div class="col-md-6">
            <div class="card card-round">
              <div class="card-header">
                <div class="card-head-row">
                  <div class="card-title">Recent Appointment Bookings</div>
                  <div class="card-tools">
                    <a href="{{ route('admin.appointments') }}" class="btn btn-label-primary btn-round btn-sm">View All</a>
                  </div>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                    <thead class="thead-light">
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
                        <td>{{ $appt->customer_name }}</td>
                        <td>{{ $appt->service_required }}</td>
                        <td>{{ \Carbon\Carbon::parse($appt->preferred_date)->format('M d, Y') }}</td>
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
                        <td colspan="4" class="text-center py-4 text-muted">No appointments booked yet.</td>
                      </tr>
                      @endforelse
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
