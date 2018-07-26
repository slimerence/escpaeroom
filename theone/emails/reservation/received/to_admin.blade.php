@component('mail::message')
    #New appointment request!
    Customer: {{ $reservation->name }}

    Game: {{ $reservation->product->name }}
    Time: {{ $reservation->at }}

    Phone: {{ $reservation->phone }}
    Email: {{ $reservation->email }}

    Participants: {{ $reservation->participants }}
    Message: {{ $reservation->messgae }}

    Regard!

@endcomponent
