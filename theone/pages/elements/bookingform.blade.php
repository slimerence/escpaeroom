<div class="modal fade" id="modalBookingForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center bg-ye">
                <h4 class="modal-title w-100 font-weight-bold color-dark">REQUEST AN APPOINTMENT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('api/booking/confirm') }}" method="post" id="BookingForm" class="booking-form">
                {{ csrf_field() }}
                <input type="hidden" name="reservation[product_id]" id="booking-room" value="{{ $product->uuid }}">
                <div class="modal-body mx-3">
                <div class="mb-3">
                    <p>Please confirm that you would like to request the following appointment:
                    </p>
                </div>
                <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="booking-date">Date</label>
                </div>

                <div class="input-group md-form mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary change-select-date-btn" data-type="prev" type="button" style="border-bottom-right-radius: 0;border-top-right-radius: 0;">&lt;</button>
                    </div>
                    <input type="date" id="booking-date" class="form-control validate book-input" name="reservation[at_date]" style="text-align: center;" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary change-select-date-btn" data-type="next" type="button" style="border-bottom-left-radius: 0;border-top-left-radius: 0;">&gt;</button>
                    </div>
                </div>

                <div class="md-form mb-3 input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="booking-time">Time</label>
                    </div>
                    <select class="custom-select book-input" id="booking-time" name="reservation[at_time]">
                        <option value="">Please choose ... </option>
                    </select>
                </div>

                <div class="md-form mb-3">
                    <div class="mb-2">
                        <h4 style="font-size: 1.1em; font-weight: bold;margin: 0;text-transform:none;">Your Information:</h4>
                        <p>Please enter your first name, last name and email address:</p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" id="booking-fname" name="reservation[firstname]" placeholder="FirstName..." class="form-control validate book-input" required>
                        </div>
                        <div class="col-6">
                            <input type="text" id="booking-lname" name="reservation[lastname]" placeholder="LastName..." class="form-control validate book-input" required>
                        </div>
                        <div class="col-12 mt-3">
                            <input type="email" id="booking-email" name="reservation[email]" placeholder="Email Address..." class="form-control validate book-input" required>
                        </div>
                    </div>
                </div>

                <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="booking-phone" class="font-weight-bold">Phone Number</label>
                    <input type="text" id="booking-phone" name="reservation[phone]" class="form-control validate book-input" required/>
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="book-group" class="font-weight-bold">Number of participants</label>
                    <?php
                    switch ($product->id) {
                        case 1:
                            $min = 4;
                            break;
                        case 2:
                            $min = 2;
                            break;
                        case 3:
                            $min = 1;
                            break;
                        default:
                    }
                    ?>
                    <input type="number" id="book-group" name="reservation[participants]" class="form-control validate book-input" min="{{ $min }}" max="16" required>
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="group-check" class="w-100 font-weight-bold" >*Minimum {{ $min }} players required!*</label>
                    <input type="checkbox" id="group-check" class="validate d-inline-block" required="required" /><span>There will be {{ $min }} players at least attending this game</span>
                </div>

                <div class="md-form mb-4">
                    <p>Anything if you want to let us know about your booking</p>
                    <textarea rows="6" class="textarea form-control book-input" id="booking-message" name="reservation[message]"></textarea>
                </div>
                <div class="mb-3" style="display: none;margin-top: 10px;" id="book-on-success">
                    <p>Your enquiry form has been saved, we will contact you very soon!</p>
                </div>
                <div class="mb-3" style="display: none;margin-top: 10px;" id="book-on-fail">
                    <p>System is busy, please try again later!</p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" id="bookingConfirmbtn" type="submit">Confirm</button>
                <a href="" class="bookingCancelbtn btn">Cancel</a>
            </div>
            </form>

        </div>
    </div>
</div>