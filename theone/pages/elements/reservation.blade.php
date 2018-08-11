<section id="reservation" class="bg-normal color-text">
    <div class="container">
        <?php
        $today = Carbon\Carbon::now('Australia/Melbourne');
        if(empty($frontdate)){
            $displayDate = $today;
        }else{
            $displayDate = $frontdate;
        }
        if(empty($month_interval)){
            $next = 1;
        }else{
            $next = intval($month_interval) + 1;
            $prev = intval($month_interval) - 1;
        }
        $tempDate = Carbon\Carbon::createFromDate($displayDate->year, $displayDate->month, 1);
        ?>
            <div class="container-fluid">
                <div class="booking-title text-center pt-10 pb-2">
                    <h2 style="font-size: 35px;color: #ffd152;">BOOK NOW</h2>
                </div>
                <div class="mb-4 calendar-title text-center">
                    @if(empty($month_interval)||($prev==0))
                    <a href="{{ url('catalog/product/'.$product->uri) }}"><i class="fa fa-angle-left float-left"></i></a>
                    @else
                    <a href="{{ url('catalog/product/'.$product->uri.'/'.$prev) }}"><i class="fa fa-angle-left float-left"></i></a>
                    @endif
                    <h4 class="text-center d-inline-block">{{ $displayDate->format('F Y') }}</h4>
                    <a href="{{ url('catalog/product/'.$product->uri.'/'.$next) }}"><i class="fa fa-angle-right float-right"></i></a>
                </div>
                <div class="row d-none d-sm-flex p-1 bg-ye color-dark week-day">
                    <h4 class="col-sm p-1 text-center">Monday</h4>
                    <h4 class="col-sm p-1 text-center">Tuesday</h4>
                    <h4 class="col-sm p-1 text-center">Wednesday</h4>
                    <h4 class="col-sm p-1 text-center">Thursday</h4>
                    <h4 class="col-sm p-1 text-center">Friday</h4>
                    <h4 class="col-sm p-1 text-center">Saturday</h4>
                    <h4 class="col-sm p-1 text-center">Sunday</h4>
                </div>

                <div class="row border border-right-0 border-bottom-0">
                    <?php
                    $skip = $tempDate->dayOfWeek;
                    for($i = 0; $i < $skip; $i++)
                    {
                        $tempDate->subDay();
                    }
                    $tempDate->addDay();
                    ?>
                    @while(($tempDate->month <= $displayDate->month && $tempDate->isSameYear($displayDate)) || $tempDate->year < $displayDate->year)
                        @for($i=0; $i < 7; $i++)
                            @if( $tempDate->startOfDay() < $today->startOfDay() || $tempDate->dayOfWeek ==1)
                                <div class="col-sm col p-2 border border-left-0 border-top-0 text-truncate color-text bg-grey">
                                    <h5 class="text-center">
                                        <span class="date unclickable">{{ $tempDate->day }}</span>
                                    </h5>
                                </div>
                            @else
                                <div class="day col-sm col p-2 border border-left-0 border-top-0 text-truncate color-text
                                {{ $tempDate->month == $displayDate->month ? 'bg-special':'bg-dark' }} ">
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