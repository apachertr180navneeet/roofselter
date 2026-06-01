@component('mail::message')
# New Appointment Booking Received

A new appointment has been submitted on your website.

**Customer Name:** {{ $appointment->customer_name }}
**Phone:** {{ $appointment->phone }}
**Email:** {{ $appointment->email ?? 'N/A' }}
**Service Required:** {{ $appointment->service_required }}
**Preferred Date:** {{ \Carbon\Carbon::parse($appointment->preferred_date)->format('d M, Y') }}
**Preferred Time:** {{ $appointment->preferred_time }}

@if($appointment->notes)
**Additional Notes:**
{{ $appointment->notes }}
@endif

@component('mail::button', ['url' => url('/admin/appointments')])
View Appointment in Admin
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
