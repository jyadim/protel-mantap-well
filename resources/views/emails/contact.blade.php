<x-mail::message>
    @component('mail::message')
    # Contact Form Submission
    
    **Name:** {{ $data['name'] }}  
    **Email:** {{ $data['email'] }}  
    **Phone:** {{ $data['phone'] }}  
    **Address:** {{ $data['address'] }}  
    
    **Message:**  
    {{ $data['message'] }}
    
    Thanks,  
    {{ config('app.name') }}
    @endcomponent
    
</x-mail::message>
