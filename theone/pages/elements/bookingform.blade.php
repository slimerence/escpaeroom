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
                <input type="hidden" name="product_id" id="booking-room" value="{{ $product->id }}">
                <div class="modal-body mx-3">
                <div class="mb-3">
                    <p>Please confirm that you would like to request the following appointment:
                    </p>
                </div>
                <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="booking-date">Date</label>
                    <input type="date" id="booking-date" class="form-control validate book-input" name="at_date" readonly>
                </div>

                <div class="md-form mb-3 input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="booking-time">Time</label>
                    </div>
                    <select class="custom-select book-input" id="booking-time" name="at_time">
                        <?php   $timeslot =  \Smartbro\Models\TimeSlot::GetAll();
                        ?>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="md-form mb-3">
                    <div class="mb-2">
                        <h4 style="font-size: 1.1em; font-weight: bold;margin: 0;text-transform:none;">Your Information:</h4>
                        <p>Please enter your first name, last name and email address:</p>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" id="booking-fname" name="firstname" placeholder="FirstName..." class="form-control validate book-input">
                        </div>
                        <div class="col-6">
                            <input type="text" id="booking-lname" name="lastname" placeholder="LastName..." class="form-control validate book-input">
                        </div>
                        <div class="col-12 mt-3">
                            <input type="email" id="booking-email" name="email" placeholder="Email Address..." class="form-control validate book-input">
                        </div>
                    </div>
                </div>

                <div class="md-form mb-3">
                    <label data-error="wrong" data-success="right" for="booking-phone" class="font-weight-bold">Phone Number</label>
                    <input type="text" id="booking-phone" name="phone" class="form-control validate book-input">
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="book-group" class="font-weight-bold">Number of participants</label>
                    <input type="number" id="book-group" class="form-control validate book-input" min="4" max="16">
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="group-check" class="w-100 font-weight-bold" >*Minimum 4 players required!*</label>
                    <input type="checkbox" id="group-check" class="validate d-inline-block" required><span>There will be 4 players at least attending this game</span>
                </div>

                <div class="md-form mb-4">
                    <p>Anything if you want to let us know about your booking</p>
                    <textarea rows="6" class="textarea form-control book-input" id="booking-message" name="message"></textarea>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" id="bookingConfirmbtn">Confirm</button>
                <a href="" class="bookingCancelbtn btn">Cancel</a>
            </div>
            </form>
            <div class="mb-3" style="display: none;margin-top: 10px;" id="txt-on-success">
                <p>Your enquiry form has been saved, we will contact you very soon!</p>
            </div>
            <div class="mb-3" style="display: none;margin-top: 10px;" id="txt-on-fail">
                <p>System is busy, please try again later!</p>
            </div>
        </div>
    </div>
</div>