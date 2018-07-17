@extends(_get_frontend_layout_path('childfrontend'))

@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))
    <section class="page-section bg-special">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 about-text">
                    <div class="wow fadeIn text-center">
                        <h2 class="color-text">We are ...</h2>
                    </div>
                    <hr class="colored">
                    <p class="color-text">The One Room Escape is established in 2016, covering an area of 1600 square metres, located at 9 ARISTOC ROAD, GLEN WAVERLEY. After a 12-month preparation, we could finally announce we are open now.<br/><br/>
                        The One built a high-end centre of escape rooms with a huge cost. We pursue the most real environment and your better gaming experience by focusing on various types of settings including mechanical high-tech interactive setups, high-quality stereo sound effects, innovative and original themes and special logic design, all these make us different from the traditional escape rooms with pad locks and physical keys etc.<br/>
                        Now we are opening three different theme escape rooms.  There will be more coming soon.<br/><br/>
                        Do you want to try something exciting and unique? Do you want to challenge your limit of thinking?</p>
                    <p class="mb-0 color-ye" style="color:#ffd152">We could blow your mind.</p>

                    <div class="wow fadeIn text-center">
                        <h2 class="color-text">We also have ...  </h2>
                    </div>
                    <hr class="colored">
                    <p class="color-text">200 square metres lounge with a low-key style of decoration and a modern photobooth.<br/><br/>
                        Sitting down with your mates after a brain-burning adventure, for a great relaxing, we provide you snacks, soft drinks and board games.<br/><br/>
                        We can also handle private parties, corporate team building activities and even a custom marriage proposal!</p>
                </div>
                <div class="col-lg-6">
                    <div class="open-item">
                        <h3>Opening hours</h3>
                        <hr class="colored">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    Mon : Close
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    Tues - Thu: 10am - 9pm
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    Fri - Sun: 10am - 10pm
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="open-item">
                        <h3>Address</h3>
                        <hr class="colored">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    9 Aristoc Road, Glen Waverley VIC 3150
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="w-100 text-center font-italic">
                                    @if($siteConfig->embed_map_code)
                                        <div id="google-map-area" style="height: 400px;">
                                            {!! $siteConfig->embed_map_code !!}
                                        </div>
                                    @endif
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection