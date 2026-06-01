@component('mail::message')
# Thank you for contacting {{ config('app.name') }}

Hi {{ $contact->username }},

Thanks for your request. We have received it and will contact you soon.

**Submitted details:**  
- Phone: {{ $contact->phone }}  
- Date: {{ $contact->date ?? 'N/A' }}  
- Message: {{ $contact->message ?? 'N/A' }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent

