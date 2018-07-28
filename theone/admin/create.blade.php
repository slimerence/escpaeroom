@extends(_get_frontend_theme_path('admin.layout.backend'))

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $pageTitle }}</h1>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create a new reservation
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @include(_get_frontend_theme_path('pages.elements.alert'))
                            </div>
                            <div class="col-lg-6">
                                <form role="form" action="{{ url('admin/reservations/create')}}" method="post" id="UpdateForm">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="booking-time">Gane</label>
                                        <select class="custom-select book-input" id="booking-room" name="reservation[product_id]">
                                            @foreach($promotionProducts as $key=>$promotionProduct)
                                            <option value="{{ $promotionProduct->uuid }}">{{ $promotionProduct->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" id="booking-date" class="form-control validate book-input" name="reservation[at_date]" required>
                                        <p class="help-block">Please check date manually before you change!</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="booking-time">Time</label>
                                        <select class="custom-select book-input" id="booking-time" name="reservation[at_time]">
                                            <option value="From 10:00 to 11:00">From 10:00 to 11:00</option>
                                            <option value="From 11:30 to 12:30">From 11:30 to 12:30</option>
                                            <option value="From 13:00 to 14:00">From 13:00 to 14:00</option>
                                            <option value="From 14:30 to 15:30">From 14:30 to 15:30</option>
                                            <option value="From 16:00 to 17:00">From 16:00 to 17:00</option>
                                            <option value="From 17:30 to 18:30">From 17:30 to 18:30</option>
                                            <option value="From 19:00 to 20:00">From 19:00 to 20:00</option>
                                            <option value="From 20:30 to 21:30">From 20:30 to 21:30</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="booking-fname">First Name</label>
                                        <input type="text" id="booking-fname" name="reservation[firstname]" placeholder="FirstName..." class="form-control validate book-input" required>
                                        <label for="booking-lname">Last Name</label>
                                        <input type="text" id="booking-lname" name="reservation[lastname]" placeholder="LastName..." class="form-control validate book-input" required>
                                        <label for="booking-email">Email</label>
                                        <input type="email" id="booking-email" name="reservation[email]" placeholder="Email Address..." class="form-control validate book-input" required>
                                    </div>
                                    <div class="form-group">
                                        <label data-error="wrong" data-success="right" for="booking-phone" class="font-weight-bold">Phone Number</label>
                                        <input type="text" id="booking-phone" name="reservation[phone]" class="form-control validate book-input" required/>
                                    </div>
                                    <div class="form-group">
                                        <label data-error="wrong" data-success="right" for="book-group" class="font-weight-bold">Number of participants</label>
                                        <input type="number" id="book-group" name="reservation[participants]" class="form-control validate book-input" min="4" max="16" required>
                                    </div>

                                    <div class="form-group">
                                        <p>Anything if you want to let us know about your booking</p>
                                        <textarea rows="6" class="textarea form-control book-input" id="booking-message" name="reservation[message]"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default btn-primary">Submit Button</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#page-wrapper -->
@endsection