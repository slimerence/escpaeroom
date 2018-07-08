@extends(_get_frontend_layout_path('childfrontend'))

@section('content')
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/childbanner.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="child-title">{{ $product->getProductName() }}</div>
                </div>
            </div>
        </div>
    </header>

    <section class="product-detail bg-dark">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </section>
@endsection