@extends('user.master')

@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-0">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="{{route('home')}}">Trang chủ</a>
                            </li>
                            <li class="is-marked">
                                <a>Đặt tour hành công</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 u-s-m-b-30">
                        <div class="contact-o u-h-100">
                            <div class="contact-o__wrap">
                                <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

                                <span class="contact-o__info-text-1">Bạn đã đặt tour thành công</span>

                                <span class="contact-o__info-text-2">Liên hệ 900 901 904 để được tư vấn</span>

                                <a href="{{route('myOrder')}}" class="contact-o__info-text-2" style="font-size: 25px;color:blue;">Xem đơn đã đặt</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->


</div>
@endsection