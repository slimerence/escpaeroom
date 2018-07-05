@extends(_get_frontend_layout_path('frontend'))

@section('content')
    <header class="childhead" style="background-image:  url({{ asset('images/backgrounds/footer-v2.jpg') }}) ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 my-auto text-center text-white">
                    <div class="weltext">
                        <h1 class="align-items-center">一路有我，安全出行</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section  class="page-section">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-fluid rounded my-5" src="{{ asset('images/intro.jpg') }}" alt="Info Image">
                </div>
                <div class="col-lg-6 my-auto">
                    <h2 class="text-center">路考知识</h2>
                    <hr class="colored">
                    <p>在维多利亚州(VICTORY)负责发放驾照的政府部门称 VICROADS, 在各区设有若干营业厅。驾照考试一共包括三部分，LEARNER PERMIT TEST(交规)，HAZARD PERCEPTION TEST(危险感知能力)，DRIVE TEST(路考)，前两个为电脑考试，在VICROADS的营业厅进行，路考在考官的监督下在VICROADS附近的道路进行。所有考试均需提前预约。驾照考试按申请人的年龄有不同安排，请各位对号入座。,</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-6 my-auto">
                    <h2 class="text-center">海外驾照OVERSEAS LICENCE持有人</h2>
                    <hr class="colored">
                    <p>先预约办理海外驾照验证（overseas licence verification appointment), 如海外驾照处于暂扣，吊销状态，在该状态终止前，你将不可考取维省驾照。预约验证大概等一个月左右，验证时请携带护照，国内驾照原件及翻译件，地址证明如银行账单，银行卡/medicare卡进行办理。验证后依次参加交规考试Learner Permit Test(成绩一年内有效），风险判断考试HPT(成绩一年内有效），路考Drive Test，中间没有间隔限制，不发Learner Permit。及格后，如果海外驾照持有超过三年，直接发FULL LICENCE，不满三年发P2。</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded my-5" src="{{ asset('images/intro.jpg') }}" alt="Info Image">
                </div>
                <div class="col-lg-12 my-auto">
                    <h2 class="text-center">L牌和风险认知测试模拟题</h2>
                    <p><a href="http://mylicence.sa.gov.au/hazard-perception-test">http://mylicence.sa.gov.au/hazard-perception-test</a></p>
                </div>
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