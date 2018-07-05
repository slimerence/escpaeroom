<section class="page-section testimonials bg-special content-special" id="press">
    <div class="container wow fadeIn">
        <h2>Testimonials</h2>
        <hr class="colored">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="testimonials-carousel">
                    <!-- Testimonial Item 1 -->
                    @foreach($news as $key=>$post)
                    <div class="item mb-4">
                        {!! $post->content !!}
                        <div class="testimonial-img">
                            <img class="rounded-circle img-fluid" src="{{$post->feature_image}}" alt="{{ $post->title }}">
                        </div>
                        <div class="testimonial-author">
                            <span class="name color-ye">{{ $post->title }}</span>
                            <p class="small">{!! $post->teasing!!}</p>
                            <div class="stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
