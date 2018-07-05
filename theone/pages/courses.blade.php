@extends(_get_frontend_layout_path('frontend'))


@section('content')
    @include(_get_frontend_layout_path('frontend._childheader'))

    <section class="page-section bg-light" id="services">
        <div class="container">
            <div class="wow fadeIn text-center">
                <h2>墨尔本驾校价格</h2>
                <p class="mb-0">1堂=45分钟  39元/堂<br/>路考：教练车+教练陪同<br/>包考过：不限次数带路考考过为止
                </p>
            </div>
            <hr class="colored">
            <table class="table wow fadeIn pricetable table-hover">
                <caption>套餐费用不含GST，转账时需加10% GST，所缴纳费用有效期2年，过期无效。</caption>
                <thead>
                <tr>
                    <th scope="col">堂数</th>
                    <th scope="col">价格</th>
                    <th scope="col">含1考</th>
                    <th scope="col">包考过</th>
                </tr>
                </thead>

                <?php $output = "<tbody>";
                for ($row=1;$row<16;$row++){
                    $output .= "<tr><td>".($row*2)."堂</td>";
                    $output .= "<td>".($row*78)."</td>";
                    $output .= "<td>".($row*78+120)."</td>";
                    $output .= "<td>".($row*78+220)."</td></tr>";
                }
                $output .= "</tbody>";
                echo $output;
                ?>
            </table>
            <div class="wow fadeIn text-center">
                <p class="mb-0">学车无压力，报名有惊喜：凡购买套餐的学员，路考前获赠考前攻略包，路考通过后赠红、绿P及盲区镜一套</p>
            </div>
        </div>
    </section>

    <section class="call-to-action" style="background-image: url({{ asset('images/backgrounds/footer-v1.jpg') }});">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <span class="quote">立刻联系我</span>
                    <hr class="colored">
                    <a class="btn btn-primary js-scroll-trigger" href="{{ url('/contact-us') }}">Enquiry Now</a>
                </div>
            </div>
        </div>
    </section>

@endsection