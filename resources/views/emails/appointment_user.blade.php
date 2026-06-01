@component('mail::message')
# Appointment Booking Confirmation

Dear **{{ $appointment->customer_name }}**,

Thank you for booking an appointment with us! We have received your request and will confirm shortly.

**Booking Details:**

**Service Required:** {{ $appointment->service_required }}
**Preferred Date:** {{ \Carbon\Carbon::parse($appointment->preferred_date)->format('d M, Y') }}
**Preferred Time:** {{ $appointment->preferred_time }}

@if($appointment->notes)
**Your Notes:**
{{ $appointment->notes }}
@endif

Our team will contact you at **{{ $appointment->phone }}** to confirm your appointment.

If you have any questions, feel free to contact us.

Thanks,
{{ config('app.name') }}
@endcomponent
