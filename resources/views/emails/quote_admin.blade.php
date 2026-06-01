@component('mail::message')
# New Quote Request Received

A new quote request has been submitted on your website.

**Name:** {{ $quote->name }}
**Phone:** {{ $quote->phone }}
**Email:** {{ $quote->email ?? 'N/A' }}
**Property Address:** {{ $quote->property_address ?? 'N/A' }}
**Service Required:** {{ $quote->service_required }}

@if($quote->message)
**Message:**
{{ $quote->message }}
@endif

@component('mail::button', ['url' => url('/admin/quotes')])
View Quote Request in Admin
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
