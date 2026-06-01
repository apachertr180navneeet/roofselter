@component('mail::message')
# Quote Request Confirmation

Dear **{{ $quote->name }}**,

Thank you for requesting a quote from us! We have received your request and will get back to you as soon as possible.

**Your Request Details:**

**Service Required:** {{ $quote->service_required }}
@if($quote->property_address)
**Property Address:** {{ $quote->property_address }}
@endif

@if($quote->message)
**Your Message:**
{{ $quote->message }}
@endif

Our team will contact you at **{{ $quote->phone }}** with a detailed quote.

Thanks,
{{ config('app.name') }}
@endcomponent
