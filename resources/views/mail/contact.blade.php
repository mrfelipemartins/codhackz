@component('mail::message')
# New Contact Message

Name: {{$data['name']}}

E-mail: {{$data['email']}}

{{$data['message']}}

@endcomponent
