<!doctype html>
<html>

@include(_get_frontend_layout_path('frontend._head'))
<body id="page-top">
@include(_get_frontend_layout_path('frontend._nav'))

@yield('content')
<section class="bg-special my-0 py-0">
    <div class="container text-center">
        <p class="copyright" style="color: #efdab9;">Please check our <a href="{{ url('/term') }}">Terms and Conditions</a> and <a href="{{ url('/policy') }}">Privacy Policy</a>.</p>
    </div>
</section>
<footer style="background-color: #353537;">
    <div class="container text-center">
        <p class="copyright" style="color: #efdab9;">&copy; Web Design & SEO by <a href="https://www.webmelbourne.com/" target="_blank">WebMelbourne</a> All Rights Reserved.</p>
    </div>
</footer>

@include(_get_frontend_layout_path('frontend.js'))

</body>
</html>