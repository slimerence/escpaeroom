<!doctype html>
<html>

@include(_get_frontend_layout_path('frontend._head'))
<body id="page-top">
@include(_get_frontend_layout_path('frontend._nav'))

@yield('content')

<footer style="background-color: #353537;">
    <div class="container text-center">
        <p class="copyright" style="color: #efdab9;">&copy; 2018 Web Melbourne All Rights Reserved.</p>
    </div>
</footer>

@include(_get_frontend_layout_path('frontend.js'))

</body>
</html>