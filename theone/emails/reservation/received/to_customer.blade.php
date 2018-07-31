@component('mail::message')
    #You have sent a new appointment request to One Room Escape!
    Customer: {{ $reservation->name }}

    Game: {{ $reservation->product->name }}
    Time: {{ $reservation->at }}

    Phone: {{ $reservation->phone }}
    Email: {{ $reservation->email }}

    Participants: {{ $reservation->participants }}
    Message: {{ $reservation->messgae }}

    Regard!

    (Sent via the The One Room Escape website)
@endcomponent
