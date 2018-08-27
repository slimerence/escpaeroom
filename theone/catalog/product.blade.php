@extends(_get_frontend_layout_path('childfrontend'))
@section('seoconfig')
    <meta name="keywords" content="{{ $product->keywords }}">
    <meta name="description" content="{{ $product->description }}">
@endsection
@section('content')
    <div id="pageloader">
        <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
    </div>
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/childbanner.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="child-title">{{ $product->getProductName() }}</div>
                </div>
            </div>
        </div>
    </header>

    <section class="product-detail bg-normal color-text">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-12 text-center">

                </div>
                <div class="col-lg-8 left-info">
                    <div class="row top-info no-margin">
                        @foreach($product_attributes as $key=>$product_attribute)
                            <div class="col-lg-4 text-center pd-box {{ $key==2 ? 'no-border-right':'' }}">
                            @if($product_attribute->location == \App\Models\Utils\OptionTool::$LOCATION_ADDITIONAL)
                                <?php $productAttributeValue = $product_attribute->valuesOf($product);
                                    if(count($productAttributeValue)>0){
                                        $value = $productAttributeValue[0]->value;
                                    }
                                ?>
                                @if($key==0)
                                    <?php
                                        $count = intval($value);
                                    ?>
                                    @for ($i=0;$i<$count;$i++)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @endfor
                                    @for ($i=0;$i<(5-$count);$i++)
                                        <i class="fa fa-star-o " aria-hidden="true"></i>
                                    @endfor
                                    <h5>{{ $product_attribute->name }}</h5>
                                @elseif( $key==1)
                                   <i class="fa fa-user mr-10" aria-hidden="true"></i> <span>{{ $value }}</span>
                                    <h5>{{ $product_attribute->name }}</h5>
                                @else
                                    <i class="fa fa-clock-o mr-10" aria-hidden="true"></i><span>{{ $value }}</span>
                                    <h5>{{ $product_attribute->name }}</h5>
                                @endif
                            @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="bottom-info">
                        <h3 class="mb-20">Game Task</h3>
                        <p>@include(_get_frontend_theme_path('catalog.elements.sections.maindesc'))</p>
                        <h3 class="mt-20 mb-20">Background story</h3>
                        {!! $product->getProductDescription() !!}
                    </div>
                </div>
                <div class="col-lg-4 right-info">
                    <ul>
                        <li><div class="iconbox"><i class="fa fa-phone" aria-hidden="true"></i></div>{{ $siteConfig->contact_phone }}</li>
                        <li><div class="iconbox"><i class="fa fa-envelope" aria-hidden="true"></i></div>{{ $siteConfig->contact_email }}</li>
                        <li><div class="iconbox"><i class="fa fa-map-marker" aria-hidden="true"></i></div>{{ $siteConfig->contact_address }}</li>
                        <li><div class="bookbtn product-book text-center">
                                <a href="#reservation" >BOOK NOW</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="slick-img">
                        @foreach($product_images as $key=>$media)
                            @if(!$key==0)
                                <img data-lazy="{{ asset($media->url) }}">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include(_get_frontend_theme_path('pages.elements.reservation'))
    @include(_get_frontend_theme_path('pages.elements.bookingform'))
@endsection