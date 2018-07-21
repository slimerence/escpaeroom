@component('mail::message')
    #New Reservation
    <p>Name: {{ $reservation->name }}</p>
    <p>Phone: {{ $reservation->phone }}</p>
    <p>Email: {{ $reservation->email }}</p>
    <p>Time: {{ $reservation->at_date }} start at{{ $reservation->at_time }}</p>
    <p>Room: {{ $reservation->product->name }}</p>
    <p>Participants: {{ $reservation->participants }}</p>
    <p>Message: {{ $reservation->messgae }}</p>

    Regard!<br>
@endcomponent
