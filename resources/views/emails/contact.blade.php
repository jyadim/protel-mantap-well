@component('mail::message')
# New Contact Form Submission

You have received a new message from **{{ $data['name'] }}** ({{ $data['email'] }}).

- **Phone**: {{ $data['phone'] }}
- **Address**: {{ $data['address'] }}

**Message:**

{{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
