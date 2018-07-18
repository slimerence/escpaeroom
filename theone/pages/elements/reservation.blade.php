<section id="reservation" class="bg-normal color-text">
    <div class="container">
        <?php
        $today = Carbon\Carbon::now();
        $tempDate = Carbon\Carbon::createFromDate($today->year, $today->month, 1);
        ?>
            <div class="container-fluid">
                <div class="row mb-4 ">
                    <div class="col-1"><i class="fa fa-angle-left"></i></div>
                    <div class="col-10"><h4 class="text-center">{{ $today->format('F Y') }}</h4></div>
                    <div class="col-1"><i class="fa fa-angle-right"></i></div>
                </div>
                <div class="row d-none d-sm-flex p-1 bg-ye color-dark week-day">
                    <h4 class="col-sm p-1 text-center">Sunday</h4>
                    <h4 class="col-sm p-1 text-center">Monday</h4>
                    <h4 class="col-sm p-1 text-center">Tuesday</h4>
                    <h4 class="col-sm p-1 text-center">Wednesday</h4>
                    <h4 class="col-sm p-1 text-center">Thursday</h4>
                    <h4 class="col-sm p-1 text-center">Friday</h4>
                    <h4 class="col-sm p-1 text-center">Saturday</h4>
                </div>

                <div class="row border border-right-0 border-bottom-0">
                    <?php
                    $skip = $tempDate->dayOfWeek;
                    for($i = 0; $i < $skip; $i++)
                    {
                        $tempDate->subDay();
                    }
                    ?>
                    @while($tempDate->month == $today->month)
                        @for($i=0; $i < 7; $i++)
                            @if( $tempDate < $today )
                                <div class="col-sm col p-2 border border-left-0 border-top-0 text-truncate color-text bg-grey">
                                    <h5 class="text-center">
                                        <span class="date unclickable">{{ $tempDate->day }}</span>
                                    </h5>
                                </div>
                            @else
                            <div class="day col-sm col p-2 border border-left-0 border-top-0 text-truncate color-text
                                {{ $tempDate->month == $today->month ? 'bg-special':'bg-dark' }} ">
                                <?php  $currentDate = $tempDate->toDateString() ?>
                                <a href="{{ url('api/booking/get-available-time-slot') }}" class="date-picker-btn" data-value="{{ $currentDate }}">
                                <h5 class="text-center">
                                    <span class="date">{{ $tempDate->day }}</span>
                                </h5>
                                </a>
                            </div>
                            @endif

                            <?php $tempDate->addDay(); ?>
                        @endfor
                        <div class="w-100"></div>
                    @endwhile
                </div>
            </div>

    </div>
</section>