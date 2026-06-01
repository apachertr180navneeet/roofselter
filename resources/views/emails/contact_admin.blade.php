@component('mail::message')
# New Contact Request

**Name:** {{ $contact->username }}  
**Phone:** {{ $contact->phone }}  
**Date:** {{ $contact->date ?? 'N/A' }}  
**Email:** {{ $contact->email ?? 'N/A' }}

**Message:**  
{{ $contact->message ?? 'N/A' }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent

