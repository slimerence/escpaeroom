@component('mail::message')
    #New appointment request!
    Name: {{ $reservation->name }}
    Phone: {{ $reservation->phone }}
    Email: {{ $reservation->email }}
    Time: {{ $reservation->at_date }} start at{{ $reservation->at_time }}
    Room: {{ $reservation->product->name }}
    Participants: {{ $reservation->participants }}
    Message: {{ $reservation->messgae }}

    Regard!<br>

@endcomponent
